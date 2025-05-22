<?php

// app/Models/BookCard.php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookCard extends Model
{
    protected $fillable = [
        'user_id', 'author', 'title', 'type', 
        'status', 'rejection_reason'
    ];
    
    const TYPE_GIVE = 'give';
    const TYPE_TAKE = 'take';
    
    const STATUS_PENDING = 'pending';
    const STATUS_APPROVED = 'approved';
    const STATUS_REJECTED = 'rejected';
    const STATUS_ARCHIVED = 'archived';
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}