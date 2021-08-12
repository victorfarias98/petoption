<?php

namespace App\Models\Pets;

use Ramsey\Uuid\Uuid;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'categories';
    protected $fillable = ['title','description'];
    protected $keyType = 'string';
    public function pet()
    {
        return $this->belongsTo(User::class, 'category_id', 'id');
    }
    protected static function booted()
    {
        static::creating(fn(Category $category) => $category->id = (string) Uuid::uuid4());
    }
}