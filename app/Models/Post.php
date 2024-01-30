<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = ['title','slug','content','category_id','description','posted','image'];

    //relacion directa
    public function category(){
        return $this->belongsTo(Category::class);
    }
}
