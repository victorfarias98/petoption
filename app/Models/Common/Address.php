<?php

namespace App\Models\Common;

use Ramsey\Uuid\Uuid;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Address extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $table = 'addresses';
    protected $fillable = ['street', 'number','district','zip_code', 'city', 'state','country', 'addressable_id', 'addressable_type'];
    protected $keyType = 'string';
    public function addressable()
    {
        return $this->morphTo();
    }
    protected static function booted()
    {
        static::creating(fn(Address $address) => $address->id = (string) Uuid::uuid4());
    }
    public static function getAddress($zip_code){
        $response = Http::get("https://viacep.com.br/ws/$zip_code/json");
        if($response->successful()){
            return json_decode($response);
        }
    }
}
