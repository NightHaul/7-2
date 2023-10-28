<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use App\Models\Purchase;
use App\Models\Favorite;
use Illuminate\Support\Facades\Storage;

class SearchController extends Controller
{
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
}
