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
        'tags'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'author_id', 'id');
    }

    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function commands()
    {
        return $this->hasMany(Command::class);
    }

    public function scopeFilter($query, array $filters)
    {
        if ($filters['search'] ?? false) {
            $query->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('tags', 'like', '%' . $filters['search'] . '%');
        }
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
