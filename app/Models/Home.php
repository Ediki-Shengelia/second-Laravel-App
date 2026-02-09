<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    public static array $type = ['Flat','Home','Apartment'];
    public static array $owner=['Owner','Broker'];
}
