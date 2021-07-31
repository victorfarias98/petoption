<?php

namespace App\Models\Pets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    protected $table = 'pets';
    protected $fillable = ['nickname','thumb','photo_url','found_on'];
}