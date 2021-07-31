<?php

namespace App\Models\Pets;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Breed extends Model
{
    use HasFactory;
    use SoftDeletes;
    public function pet()
{
    return $this->belongsTo(Pet::class, 'breed_id', 'id');
}
}