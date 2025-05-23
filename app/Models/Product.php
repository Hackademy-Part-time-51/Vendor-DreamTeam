<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Laravel\Scout\Searchable;

class Product extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'title',
        'price',
        'description',
        'category_id',
        'user_id',
        'city',
        'latitudine',
        'longitudine'
    ];

    /**
     * Get the user that owns the product.
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    

    /**
     * Get the category that the product belongs to.
     */
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function users()
    {
        return $this->belongsToMany(User::class);

    }

    public function setAccepted($value)
    {
        $this->is_accepted=$value;
        $this->save();
        return true;
    }

    public static  function toBeRevisedCount()  
    {
        return Product::where('is_accepted', null)->count();    
    }
    public static  function acceptedCount()  
    {
        return Product::where('is_accepted', 1)->count();    
    }
    public static  function rejectedCount()  
    {
        return Product::where('is_accepted', 0)->count();    
    }

    public function images(){
        return $this->hasMany(Image::class);
    }

    public function toSearchableArray()
    {
        return[
            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'category'=>$this->category
        ];
    }

}
