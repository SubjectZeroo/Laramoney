<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaction extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'account_id',
        'category_id',
        'transaction_category_id',
        'name',
        'amount',
        'reference',
        'description',
        'file',
        'transaction_date'
    ];

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }

    public function account()
    {
        return $this->belongsTo(Account::class);
    }

    public function transactionCategory()
    {
        return $this->belongsTo(TransactionCategory::class);
    }
}
