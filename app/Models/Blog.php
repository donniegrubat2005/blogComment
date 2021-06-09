<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $table ='blogs';

    protected $fillable = ['name', 'comments'];


    public function replies() 
    {
        return $this->hasMany(Reply::class, 'blog_id');
    }
}
