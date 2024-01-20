<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    use HasFactory;
    public function users(){
        return $this->hasMany(UserModel::class);
        //return $this->belongsTo(UserModel::class);
    }
}
