<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'balance',
        'account_number',
        'description'
    ];

    public function deleteData($id)
    {
        return static::find($id)->delete();
    }

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
