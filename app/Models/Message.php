<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;
        protected $fillable = [
            'sender_id',
            'receiver_id',
            'product_id',
            'message',
            'is_read'
        ];
    
        public function sender()
        {
    
            return $this->belongsTo(User::class, 'sender_id', 'id');
    
        }
    
        public function receiver()
        {
            return $this->belongsTo(User::class, 'receiver_id', 'id');
        }

        public function product()
        {
            return $this->belongsTo(Product::class, 'product_id', 'id');
        }
    }
