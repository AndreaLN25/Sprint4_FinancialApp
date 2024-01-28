<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'all_users';

    protected $fillable = [
        'first_name',
        'last_name',
        'mailadress',
        'password',
    ];

    public function transactions(){
        return $this->hasMany(TransactionModel::class);
        //return $this->belongsToMany(TransactionModel::class);
    }
    public function sharedTransactions(){
        return $this->hasMany(SharedTransactionModel::class, 'user_id');
        //return $this->belongsToMany(SharedTransactionModel::class, 'shared_transactions', 'user_id', 'transaction_id');
        //return $this->hasMany(SharedTransactionModel::class, 'user_paid', 'full_name');


}

    public function getFullNameAttribute()//user_paid en la tabla shared_transactions se relaciona con el resultado del método getFullNameAttribute en el modelo UserModel
    {
        return $this->attributes['first_name'] . ' ' . $this->attributes['last_name'];
    }

}
