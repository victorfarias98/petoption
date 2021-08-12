<?php

namespace App\Models\Pets;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pet extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $keyType = 'string';
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
    public function addresses()
    {
        return $this->morphOne(Adress::class, 'addressable');
    }
    protected static function booted()
    {
        static::creating(fn(Pet $pet) => $pet->id = (string) Uuid::uuid4());
    }
}
