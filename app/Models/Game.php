<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'author_id'
    ];
    public function Author()
    {
        return $this->belongsTo(Author::class);
    }
    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'game_tag');
    }
}
