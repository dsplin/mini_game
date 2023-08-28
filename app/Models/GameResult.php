<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GameResult extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'random_number', 'result', 'win_amount'];

    // Додайте зв'язок з користувачем, якщо потрібно
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
