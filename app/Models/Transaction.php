<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['event', 'booking_code', 'asset_id', 'approval', 'start_date', 'finish_date', 'user_id', 'term', 'rental_price', 'total_price'];

    protected $casts = ['start_date' => 'datetime', 'finish_date' => 'datetime'];

    // protected $with = ['asset', 'borrower'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function asset()
    {
        return $this->belongsTo(Asset::class)->withTrashed();
    }

    public function user() // borrower
    {
        return $this->belongsTo(User::class)->with('roles');
    }
}
