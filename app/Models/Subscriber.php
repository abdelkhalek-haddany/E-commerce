<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Subscriber extends Model
{

    protected $table = 'subscribers';

    protected $guarded = [];

}
