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
        'transaction_id',
        'amount',
        'participants',
        'approval_status',
        'note',
    ];

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }

    public function transaction()
    {
        return $this->belongsTo(TransactionModel::class, 'transaction_id');
    }
}
