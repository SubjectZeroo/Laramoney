<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Goal extends Model
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
        'name',
        'balance',
        'amount',
        'deposit',
        'deadline',
    ];

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }
}
