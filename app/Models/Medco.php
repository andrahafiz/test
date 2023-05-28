<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medco extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'medcos';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'username', 'password'];
}
