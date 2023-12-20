<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'content',
        'author_id',
        'view_count',
        'likes_count',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    // create slug from title
    static function createSlug(string $title): string
    {
        // Convert the title to lowercase
        $slug = strtolower($title);

        // Replace spaces with dashes
        $slug = str_replace(' ', '-', $slug);

        // Remove special characters
        $slug = preg_replace('/[^A-Za-z0-9\-]/', '', $slug);

        return $slug;
    }
}
