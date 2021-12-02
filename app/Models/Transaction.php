<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
    ];

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }
}
