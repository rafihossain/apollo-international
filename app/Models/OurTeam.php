<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OurTeam extends Model
{
    use HasFactory;
    protected $table = "our_teams";
    protected $fillable = ['member_name','member_position','member_image','facebook','twitter','pinterest','country','instagram','linkedin','youtube','status'];
}
