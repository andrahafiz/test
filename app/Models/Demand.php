<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Demand extends Model
{
    use HasFactory, SoftDeletes;
    protected $table = 'demands';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'gas_id', 'customer_id', 'request_gas', 'received_gas', 'status'];

    public function gas()
    {
        return $this->belongsTo(Gas::class, 'gas_id', 'id');
    }
    public function customer()
    {
        return $this->belongsTo(Customer::class, 'customer_id', 'id');
    }
}
