<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];


    public function blogs()
    {
        return $this->hasMany(Blog::class, 'author_id', 'id');
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
