<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use App\Models\Item;
use App\Models\Purchase;


class AdminLoginController extends Controller
{
    public function adminlogin()
    {
        return view('adminlogin');
    }


    public function adminregister()
{
    return view('adminregister');
}

public function adminregisterSubmit(Request $request)
{
    $user = new User;
    $user->name = $request->input('name');
    $user->email = $request->input('email');
    $user->password = Hash::make($request->input('password'));
    $user->role = $request->input('role');
    // Check the referrer and set the role accordingly

    $user->save();
    Auth::login($user);
    return redirect(RouteServiceProvider::ADMIN_DASHBOARD);


}

public function admindash()
{

    $users = User::where('role', 1)->get();
    $items = Item::all();



    return view('admindash', ['users' => $users, 'items' => $items]);
}


public function adminuserlist(Request $request, User $user)
{
    // URLパラメータからユーザーIDを取得
    $userId = $user->id;

    // ユーザーが出品した全アイテムを取得
    $items = Item::where('user_id', $userId)->get();

    // ユーザー情報も取得
    $user = User::find($userId);

    // ユーザーが出品したアイテムとユーザー情報をビューに渡す
    return view('adminuserlist', ['user' => $user, 'items' => $items]);
}


public function admindestroy(Item $item)
{
    $purchases = Purchase::where('item_id', $item->id)->get();

    // アイテムに関連する購入テーブルのレコードが存在するかチェック
    if ($purchases->count() > 0) {
        // アラートメッセージを設定
        $message = 'このアイテムはすでに購入されています。削除できません。';
        // アラートメッセージをセッションに保存
        session()->flash('alert_message', $message);
        // アラートタイプをセッションに保存
        session()->flash('alert_type', 'danger');
        return response()->json(['message' => $message], 400);
    } else {
        // 関連がない場合、アイテムを削除
        $item->delete();
        return response()->json(['message' => 'アイテムが削除されました。'], 200);
    }
}

}
