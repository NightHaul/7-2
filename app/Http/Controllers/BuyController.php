<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\PostRequest;
use App\Models\Purchase;
use App\Models\Favorite;
use Illuminate\Support\Facades\Storage;

class BuyController extends Controller
{
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
}
