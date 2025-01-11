<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transaction extends Model
{
    /** @use HasFactory<\Database\Factories\TransactionFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['event', 'booking_code', 'asset_id', 'start_date', 'finish_date', 'borrower_id'];
    protected $casts = ['start_date' => 'datetime', 'finish_date' => 'datetime'];


}
