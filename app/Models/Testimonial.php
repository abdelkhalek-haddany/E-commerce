<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class Testimonial extends Model

{
    use HasFactory;
    protected $table="testimonials";
    protected $fillable=['id','name','job','facebook','opinion','about','created_at'];
    protected $hidden=['updated_at'];
    public $timestamps=false;
}