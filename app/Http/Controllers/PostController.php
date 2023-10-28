<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use App\Models\Purchase;
use App\Models\Favorite;



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
        // インプリシットバインディング
        // $item = Item::findOrfail($id);

        return view('show')
            ->with(['item' => $item]);
    }


    public function create()
    {
        return view('create');
    }

    //     private function userIsSelling($user, $item)
    // {

    //     return $user->id !== $item->user_id;
    // }



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
        // インプリシットバインディング
        // $item = Item::findOrfail($id);


        return view('edit')
            ->with(['item' => $item]);
    }


    public function update(PostRequest $request, Item $item)
    {


        $item->user_id = auth()->user()->id;
        $item->name = $request->name;
        $item->category = $request->category;
        $item->condition = $request->condition;
        $item->price = $request->price;
        $item->memo = $request->memo;
        $item->image_path = $request->image_path;
        $item->save();

        session()->flash('success_message', '編集が完了しました');

        return redirect()->route('createlist');
    }

    public function destroy(Item $item)
    {

        $item->delete();



        return redirect()->route('createlist');
    }



    public function buy(Item $item)
    {

        return view('buy')
            ->with(['item' => $item]);;
    }

    public function complete(Item $item)
    {

        $purchas = new Purchase();
        $purchas->user_id = auth()->user()->id;
        $purchas->item_id = $item->id;
        $purchas->save();

        $item->visible = 0;
        $item->save();

        return view('complete')
            ->with(['item' => $item]);;
    }

    public function searchItem(Request $request)
    {
        // 検索フォームで入力された値を取得する
        $search = $request->input('search');

        // もし検索キーワードが入力されている場合
        if ($search) {
            // 検索クエリを実行して該当する商品を取得
            $searchItems = Item::where('name', 'like', '%' . $search . '%')->paginate(20);
        } else {
            // キーワードが入力されていない場合、すべての商品をページネートして表示
            $searchItems = Item::paginate(20);
        }

        if (!empty($searchItems)) {
            foreach ($searchItems as $item) {
                $is_favorite = Favorite::where([
                    'user_id' => $item->user_id,
                    'item_id' => $item->id
                ])->exists();

                $item['is_favorite'] = $is_favorite;
            }
        } else {
        }
        return view('dashboard')->with(['items' => $searchItems]);
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

    public function dasha()
    {
        return view('dasha');
    }

    public function dashb()
    {
        return view('dashb');
    }

    public function dashc()
    {
        return view('dashc');
    }
    public function dashd()
    {
        return view('dashd');
    }
}
