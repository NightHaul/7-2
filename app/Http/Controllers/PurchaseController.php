<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Purchase;

class PurchaseController extends Controller
{



    public function purchase()
    {
        $user = auth()->user();
        $purchaseuser = Purchase::where('user_id', $user->id)
        ->orderBy('created_at', 'desc') // created_at カラムで降順ソート
        ->get();

        $purchaseData = [];

        foreach ($purchaseuser as $purchase) {
            $item = Item::find($purchase->item_id);
            if ($item) {
                $purchaseData[] = [
                    'imagePath' => $item->image_path,
                    'itemName' => $item->name,
                    'itemCreate' => $item->created_at,
                ];

            }

        }
        return view('purchase')->with('purchaseData', $purchaseData);
    }
}
