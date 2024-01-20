<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserModel extends Model
{
    use HasFactory;
    protected $table = 'all_users';

    public function transactions(){
        return $this->hasMany(TransactionModel::class);
        //return $this->belongsToMany(TransactionModel::class);
    }
}
