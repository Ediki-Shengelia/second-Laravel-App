<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function isLikedByUser($user)
    {
        return $user ? $this->likes()->where('user_id', $user->id)->exists() : false;
    }
    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public static array $type = ['Flat', 'Home', 'Apartment'];
    public static array $owner = ['Owner', 'Broker'];
    protected $fillable = ['location', 'price', 'type', 'phone_number', 'owner', 'area', 'unique_id', 'description', 'home_image', 'user_id'];
}
