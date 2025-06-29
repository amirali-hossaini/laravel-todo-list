<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'is_admin',
        'email_verified_at'
    ];

    public function isAdmin(): bool
    {
        return $this->is_admin;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function avatar(
        ?string $email = null,
        int $size = 900,
        string $default_image_type = 'mp',
        bool $force_default = false,
        string $rating = 'g',
    ): string {
        $email = is_null($email) ? $this->email : $email;

        // Prepare parameters.
        $params = [
            's' => htmlentities($size),
            'd' => htmlentities($default_image_type),
            'r' => htmlentities($rating),
        ];
        if ($force_default) {
            $params['f'] = 'y';
        }

        // Generate url.
        $base_url = 'https://www.gravatar.com/avatar';
        $hash = hash('sha256', strtolower(trim($email)));
        $query = http_build_query($params);
        $url = sprintf('%s/%s?%s', $base_url, $hash, $query);

        return $url;
    }

    public function projects(): HasMany
    {
        return $this->hasMany(Project::class);
    }
}
