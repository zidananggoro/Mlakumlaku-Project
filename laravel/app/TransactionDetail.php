<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TransactionDetail extends Model
{
    

    protected $fillable = ['transactions_id','username','nationality','isvisa','doe_passport'
        ];
        

    protected $hidden = [

    ];

    public function transaction()
    {
        return $this->belongsTo(Transaction::class, 'transaction_details','id');
    }
}
