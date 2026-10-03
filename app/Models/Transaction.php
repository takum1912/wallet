<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory;

    protected $fillable = [
        'user_id',
        'type',
        'amount',
        'category',
        'content',
        'memo',
        'transaction_date',
    ];

    protected $casts = [
        'transaction_date' => 'date',
        'amount' => 'integer',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
