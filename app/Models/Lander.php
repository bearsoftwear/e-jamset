<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Lander extends Model
{
    /** @use HasFactory<\Database\Factories\LanderFactory> */
    use HasFactory, SoftDeletes;

    protected $fillable = ['name'];
    protected $hidden = ['created_at', 'updated_at', 'deleted_at'];

    public function assets()
    {
        return $this->hasMany(Asset::class);
    }
}
