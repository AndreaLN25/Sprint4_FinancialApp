<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedTransactionModel extends Model
{
    use HasFactory;

    protected $table = 'shared_transactions';

    protected $fillable = [
        'user_id',
        //'transaction_id',
        'amount',
        'user_paid',
        'number_of_participants',
        'name_of_participants',
        'amount_per_participant',
        'date',
        'description',
        'approval_status',
        'note',
    ];

    protected $casts = [
        'name_of_participants' => 'json',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }

    /* public function transaction()
    {
        return $this->belongsTo(TransactionModel::class, 'transaction_id');
    } */
    public function payerUser()
    {
        return $this->belongsTo(UserModel::class, 'user_paid','id');
    }
}
