<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    // kolom yang bisa di isi
    protected $fillable = [
        'name',
        'user_id'
    ];
    // relasi ke tabel user
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // relasi ke tabel post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

}
