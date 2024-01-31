<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['title', 'content', 'slug', 'category_id'];

    public function seTitleAttribute($_title) {

        $this->attributes['title'] = $_title;
        $this->attributes['slug'] = Str::slug($_title);
        }

    public function category() {
        return $this->belongsTo(Category::class);
    }
}
