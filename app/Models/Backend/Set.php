<?php

namespace App\Models\Backend;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;
    protected $fillable=['price','quantity','custom','product_id'];



    public function sizes()
    {
        return $this->belongsToMany(Size::class);
    }

    public function colors()
    {
    return $this->belongsToMany(Color::class);
    }

    public function product(){
        return $this->belongsTo(Product::class);
    }
}
