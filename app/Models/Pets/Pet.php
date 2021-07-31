<?php

namespace App\Models\Pets;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Pet extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'pets';
    protected $fillable = ['nickname','thumb','photo_url','found_on'];
    public function breed()
    {
        return $this->hasOne(Breed::class,'id', 'breed_id');
    }
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}