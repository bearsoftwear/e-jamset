<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Borrower extends Model
{
    /** @use HasFactory<\Database\Factories\BorrowerFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['NIK', 'user_id', 'name'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];
}
