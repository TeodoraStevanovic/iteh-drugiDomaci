<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Breed extends Model
{
    use HasFactory;

    public function dogs()
    {
        //jedna vrsta ima vise pasa
        return $this->hasMany(Dog::class);
    }
}
