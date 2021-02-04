<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AddressModel extends Model
{
    use HasFactory, SoftDeletes;

    protected $table    = 'ai_address';
    protected $fillable = ['name', 'description', 'phone', 'img'];
    protected $hidden   = ['created_at', 'updated_at', 'deleted_at'];
}
