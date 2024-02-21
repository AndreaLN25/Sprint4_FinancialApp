<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    use HasFactory;
    protected $table = 'all_transactions';

    protected $fillable = [
        'movement_type',
        'user_id',
        'description',
        'date',
        'amount',
        'completed',
        'category_income',
        'category_expense',
        'payment_method_income',
        'payment_method_expense',
    ];

    protected $dates = ['date'];

    public function users(){
        return $this->belongsTo(UserModel::class,'user_id');
    }
    /* public function sharedTransactions(){
        return $this->hasMany(SharedTransactionModel::class, 'transaction_id','id');
    } */
}
