<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use App\Models\Purchase;
use App\Models\Favorite;
use Illuminate\Support\Facades\Storage;



class PostController extends Controller
{


    public function dashboard()
    {


        $items = Item::where('user_id', '!=', auth()->user()->id)->orderBy('id', 'desc')->get();


        if (!empty($items)) {
            foreach ($items as $item) {
                $is_favorite = Favorite::where([
                    'user_id' => $item->user_id,
                    'item_id' => $item->id
                ])->exists();

                $item['is_favorite'] = $is_favorite;
            }
        }

        return view('dashboard')
            ->with(['items' => $items]);
    }


    public function show(Item $item)
    {


        return view('show')
            ->with(['item' => $item]);
    }


    public function create()
    {
        return view('create');
    }



    public function store(PostRequest $request)
    {

        $item = new item();
        $item->user_id = auth()->user()->id;
        $item->name = $request->name;
        $item->category = $request->category;
        $item->condition = $request->condition;
        $item->price = $request->price;
        $item->memo = $request->memo;

        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('public/images');
            $item->image_path = str_replace('public/', 'storage/', $imagePath);
        }

        $item->visible = 1;

        $item->save();

        return redirect()->route('dashboard');
    }


    public function createlist()
    {
        // 現在のユーザーに関連付けられたアイテムを取得
        $user = auth()->user();
        $items = Item::where('user_id', auth()->user()->id)
            ->orderBy('id', 'desc')
            ->get();

        return view('createlist', compact('items'));
    }

    public function edit(Item $item)
    {



        return view('edit')
            ->with(['item' => $item]);
    }


    public function update(PostRequest $request, Item $item)
    {
        // $item = new item();
        $item->user_id = auth()->user()->id;
        $item->name = $request->name;
        $item->category = $request->category;
        $item->condition = $request->condition;
        $item->price = $request->price;
        $item->memo = $request->memo;
        if ($request->hasFile('image_path')) {
            $imagePath = $request->file('image_path')->store('public/images');
            $item->image_path = str_replace('public/', 'storage/', $imagePath);
        }
        $item->save();

        session()->flash('success_message', '編集が完了しました');

        return redirect()->route('createlist');
    }



    public function destroy(Item $item)
    {

        $item->delete();



        return redirect()->route('createlist');
    }








    public function hideItem($itemId)
    {
        $item = Item::find($itemId);

        if (!$item) {
            return redirect()->back()->with('error', '商品が見つかりませんでした。');
        }

        // ログインユーザーが商品の所有者であるか確認
        if ($item->user_id == auth()->user()->id) {
            $item->visible = false;
            $item->save();
            return redirect()->back()->with('success', '商品を非表示にしました。');
        }

        return redirect()->back()->with('error', 'この商品を非表示にする権限がありません。');
    }
}
