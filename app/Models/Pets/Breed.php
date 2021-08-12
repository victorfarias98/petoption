<?php

namespace App\Models\Pets;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Breed extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'breeds';
    protected $fillable = ['title','description'];
    protected $keyType = 'string';
    public function pet()
    {
        return $this->belongsTo(Pet::class, 'breed_id', 'id');
    }
    protected static function booted()
    {
        static::creating(fn(Breed $breed) => $breed->id = (string) Uuid::uuid4());
    }
}