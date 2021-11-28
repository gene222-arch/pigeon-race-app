<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function pigeons()
    {
        return $this->hasMany(MyPigeon::class);
    }

    public function detail()
    {
        return $this->hasOne(UserDetail::class);
    }

    public function assignUserRole()
    {
        $this->assignRole('User');
    }

    public function club()
    {
        return Club::query()->find($this->clubUsers->club_id);
    }

    public function clubUsers()
    {
        return $this->hasOne(ClubUser::class, 'user_id');
    }

    public function tournaments()
    {
        return $this->hasMany(TournamentDetail::class);
    }

    public function activeTournament()
    {
        return Tournament::query()
            ->where([
                [ 'is_active', '=', true ],
                [ 'club_name', '=', $this->club()->name]
            ])
            ->first()
            ->details()
            ->firstWhere('user_id', '=', $this->id);
    }
}
