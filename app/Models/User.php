<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Str;
use Laravel\Sanctum\HasApiTokens;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class User extends Authenticatable implements HasMedia
{
    use HasApiTokens, HasFactory, Notifiable, InteractsWithMedia;

    public const PLACEHOLDER_IMAGE = 'images/avatar-placeholder.jpg';

    /**
     * The attributes that are mass assignable.
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'date_of_birth',
        'gender',
        'email_verified_at',
        'avatar_path',
        'avatar_url',
        'role',
        'provider',
        'provider_id',
        'provider_token',
        'isFirstLogin',
    ];

    /**
     * The attributes that should be hidden for serialization.
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password'          => 'hashed',
    ];

    public static function generateUserName($username)
    {
        if($username === null) {
            $username = Str::lower(Str::random(8));
        }

        if ( User::where('username', $username)->exists() ) {
            $newUsername = Str::lower(Str::random(3));
            $username = self::generateUserName($newUsername);
        }

        return $username;
    }


    public function resource()
    {
        return $this->hasMany(Resource::class);
    }


    public function onboardingQuestion()
    {
        return $this->hasOne(OnboardingQuestion::class);
    }

    public function getAvatarPathAttribute()
    {
        return $this->hasMedia()  ? $this->getFirstMediaUrl('default') : asset(self::PLACEHOLDER_IMAGE);
    }

    // Media Resizing
    public function registerMediaConversions(Media $media = null): void
    {
        $this->addMediaConversion('thumb')
            ->width(100)
            ->height(100);
    }

//    public function likes()
//    {
//        return $this->belongsToMany(Lesson::class, 'lessons', 'user_id', 'lesson_id');
//    }

    public function lesson()
    {
        return $this->belongsToMany(Lesson::class, 'lessons', 'user_id', 'lesson_id');
    }


}
