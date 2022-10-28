<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Str;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    const CONDITION_SUPER_ADMIN = "Super Admin";
    const CONDITION_ADMIN = "Admin";
    const CONDITION_PROVIDER = "Usuario";

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'email',
        'name',
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


    public function scopeWhenEmail($query, $email)
    {
        return $query->when($email, function ($query, $email) {
            return $query->where('email', 'LIKE', "%$email%");
        });
    }

    public function scopeWhenCondition($query, $condicion)
    {
        return $query->when($condicion, function ($query, $condition) {
            if (Str::title($condition) === self::CONDITION_PROVIDER) {
                return $query->whereDoesntHave('roles');
            } else {
                return $query->whereHas('roles', function ($query) use ($condition) {
                    return $query->where('name', '=', Str::title($condition));
                });
            }
        });
    }
}
