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
}
