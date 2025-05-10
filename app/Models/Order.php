<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
   use HasFactory;

    protected $fillable = [
        'user_id',
        'game_id',
        'product_id',
        'game_user_id',
        'payment_method',
        'amount',
        'transaction_screenshot',
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

    // Relation with TopUpProduct
    public function product()
    {
        return $this->belongsTo(TopUpProduct::class);
    }
}
