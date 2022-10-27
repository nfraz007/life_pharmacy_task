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

    protected $appends = ["created_at_label", "updated_at_label", "email_verified_at_label"];

    public function getCreatedAtLabelAttribute()
    {
        return $this->created_at ? $this->created_at->format(config("constants.datetime_label")) : "";
    }

    public function getUpdatedAtLabelAttribute()
    {
        return $this->updated_at ? $this->updated_at->format(config("constants.datetime_label")) : "";
    }

    public function getEmailVerifiedAtLabelAttribute()
    {
        return $this->email_verified_at ? $this->email_verified_at->format(config("constants.datetime_label")) : "";
    }
}
