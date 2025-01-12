<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Asset extends Model
{
    /** @use HasFactory<\Database\Factories\AssetFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['lander_id', 'name', 'location', 'rental_price', 'image'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function lander()
    {
        return $this->belongsTo(Lander::class);
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
