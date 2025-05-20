<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   use HasFactory;

    protected $fillable = [
        'email',
        'game_uid',
        'sender_number',
        'transaction_id',
        'payment_method',
        'product_id',
        'game_id',
        'price',
        'status',
    ];

    // Relation with User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relation with Game
    public function game()
    {
        return $this->belongsTo(Game::class);
    }


    public function product()
{
    return $this->belongsTo(TopUpProduct::class, 'product_id');
}
}
