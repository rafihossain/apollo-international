<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactModel extends Model
{
    use HasFactory;
    protected $table = "contacts";
    protected $fillable = ['country','address','phone','email','facebook','twitter','pinterest','instagram','linkedin','youtube','location_image'];
}
