<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'category',
        'condition',
        'price',
        'memo',
        'image_path',
        'user_id',
        'visible'
    ];

    public function user()
{
    return $this->belongsTo(User::class);
}

public function purchases()
{
    return $this->hasMany(Purchase::class);
}

public function favorites()
{
    return $this->belongsToMany(Favorite::class);
}

// protected static function boot()
// {
//     parent::boot();

//     static::deleting(function($item) {
//         // 関連する購入履歴も削除
//         $item->purchaseHistories()->delete();
//     });
// }

}
