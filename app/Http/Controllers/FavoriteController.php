<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use App\Models\User;
use App\Models\Favorite;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{


    public function favorite()
    {
        $user = Auth::user();

        // visible が 1 (表示) のアイテムのみを取得
        $favorites = Favorite::join('items', 'favorites.item_id', '=', 'items.id')
            ->where('favorites.user_id', $user->id)
            ->where('items.visible', 1)
            ->orderBy('favorites.created_at', 'desc')
            ->get();

        $favoritesData = [];

        foreach ($favorites as $favorite) {
            $favoritesData[] = [
                'imagePath' => $favorite->image_path,
                'itemName' => $favorite->name,
                'price' => $favorite->price,
                'itemId' => $favorite->item_id,
            ];
        }

        return view('favorite')->with('favoritesData', $favoritesData);
    }

    public function addToFavorites(Request $request, $item)
    {
        // ログインしているユーザーのIDを取得
        $user_id = auth()->user()->id;

        // データベース内に同じ組み合わせが存在しないか確認
        // 該当が見つかればtrue。そうじゃなかったらfalseかと思いきやnull
        $existingFavorite = Favorite::where('user_id', $user_id)
            ->where('item_id', $item)
            ->first();

        if (!$existingFavorite) {
            // 同じ組み合わせが存在しない場合、お気に入りを追加
            Favorite::create([
                'user_id' => $user_id,
                'item_id' => $item,
            ]);

            // 成功した場合のレスポンスを返す（Ajax用にJSON形式で返すことが一般的）
            return response()->json(['message' => 'お気に入りに追加しました']);
        }

        // すでに「いいね」済みの場合は何もしない
        return response()->json(['message' => 'すでにお気に入りに追加されています']);
    }


    public function removeFromFavorites(Request $request, $item)
    {
        // ログインしているユーザーのIDを取得
        $user_id = auth()->user()->id;

        // データベース内から該当のお気に入りレコードを削除
        Favorite::where('user_id', $user_id)
            ->where('item_id', $item)
            ->delete();

        // 削除が成功した場合のレスポンスを返す（Ajax用にJSON形式で返すことが一般的）
        return response()->json(['message' => 'お気に入りから削除しました']);
    }
}
