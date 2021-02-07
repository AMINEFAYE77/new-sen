<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
        protected $guarded= [

        ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'status' => 'boolean',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }
    public function region(){
        return $this->belongsTo(Region::class);
    }
    public function commune(){
        return $this->belongsTo(Commune::class);
    }
    public function type_product(){
        return $this->belongsTo(TypeProduct::class);
    }

    public function scopeActif($query)
    {
        return $query->where('status',true);
    }

    /*public function scopeInactif($query)
    {
        return $query->where('status',false);
    }*/

}
