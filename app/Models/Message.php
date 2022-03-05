<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Message extends Model

{
    use HasFactory;
    protected $table="messages";
    protected $fillable=['id','name','email','subject','message','isReader','isAnswer','created_at'];
    protected $hidden=['updated_at'];
    public $timestamps=false;
}