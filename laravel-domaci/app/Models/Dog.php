<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dog extends Model
{
    use HasFactory;
    
    //protected $fillable = [ 'name', 'date_of_birth', 'age' ];

     protected $guarded = [];
     // to znaci da sve moze da unese kako on hoce
     // treca opcija //protected $guarded = ['id'];
    
     public function breed()
    {
        //jedan pas pripada iskljucivo jednoj vrsti
        return $this->belongsTo(Breed::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    } 
}
