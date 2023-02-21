<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Publisher extends Model
{
    use HasFactory;
    public function books()
    {
        return $this->hasMany('App\Models\Book', 'publisher_id');
    }
}
