<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InTransaction extends Model
{
    use HasFactory;


    protected $fillable = [
        'transaction_code',
        'id_stock',
        'total_item',
        'information',
    ];


    public function stock(){
        return $this->belongsTo(Stock::class, 'id_stock');
    }

}
