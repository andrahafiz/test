<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gas extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'gases';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'availability', 'period', 'status', 'lelang', 'approv'];

    protected $dates = [
        'period'
    ];
}
