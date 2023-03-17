<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'username',

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    public function role()
    {
        return $this->belongsToMany('App\Models\ManagementAccess\Role')->withPivot('role_id');
    }
    public function role_user()
    {
        return $this->hasMany('App\Models\ManagementAccess\RoleUser','user_id');
    }
    // relasi ke tabel post
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    // relasi ke tabel category
    public function categories()
    {
        return $this->hasMany(Category::class);
    }
    // relasi ke tabel type_user 
    public function type_user()
    {
        //3 parameters (path model,field foreign key, field primary key from table hasMany/hasone)
        return $this->belongsTo('App\Models\User','type_user_id','id');
    }
}
