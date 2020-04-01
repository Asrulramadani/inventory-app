<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_code',
        'name',
        'id_category',
        'id_unit',
        'stock',
    ];

    function category(){
        return $this->belongsTo(Category::class, 'id_category');
    }


    function unit(){
        return $this->belongsTo(Unit::class, 'id_unit');
    }

    public function inTransaction(){
        return $this->hasMany(InTransaction::class, 'id_stock');
    }
}
