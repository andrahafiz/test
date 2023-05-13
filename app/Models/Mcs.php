<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mcs extends Authenticatable
{
    use HasFactory, SoftDeletes;

    protected $table = 'mcs';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'username', 'password'];
}
