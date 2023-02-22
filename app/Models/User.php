<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
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
    ];

    // relation to idea model
    public function ideas()
    {
        return $this->hasMany(Idea::class);
    }


    public function getAvatar(): string
    {

        // get user email first character
        $firstCharacter = $this->email[0];


        // get integer from user first email character
        $integerToUse = is_numeric($firstCharacter) ?
            ord(strtolower($firstCharacter)) - 21 :
            ord(strtolower($firstCharacter)) - 96;


        // hash user email
        $emailHash     = md5($this->email);

        // get avatar image from gravatar by hashed user email
        // and get the default image if the email is not exist in gravatar by first character of user email

        return "https://www.gravatar.com/avatar/{$emailHash}?s=200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-{$integerToUse}.png";
    }


    public function votes()
    {
        return $this->belongsToMany(Idea::class, 'votes');
    }
}
