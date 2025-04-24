<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Product extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = [
        'title','price','description','category_id','user_id'
    ];
=======
    protected $fillable = ['title','price','description','category_id'];
>>>>>>> 9b2ebbcf53d4bce5273268b578d488209fe3f0e6

    public function category()
    {
        
        return $this->belongsTo(Category::class);
    }
<<<<<<< HEAD

=======
>>>>>>> 9b2ebbcf53d4bce5273268b578d488209fe3f0e6
    public function user()
    {
        return $this->belongsTo(User::class);
    }
<<<<<<< HEAD
=======

>>>>>>> 9b2ebbcf53d4bce5273268b578d488209fe3f0e6
}
