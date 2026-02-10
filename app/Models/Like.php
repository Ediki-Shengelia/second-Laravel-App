<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Like extends Model
{
    use Notifiable;
    protected $fillable = ['user_id', 'home_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
