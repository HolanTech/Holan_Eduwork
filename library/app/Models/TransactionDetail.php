<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionDetail extends Model
{
    use HasFactory;
    public function transactions()
    {
        return $this->hasMany('App\Models\TransactionDetail', 'transaction_id');
    }
    public function books()
    {
        return $this->hasMany('App\Models\book', 'book_id');
    }
}
