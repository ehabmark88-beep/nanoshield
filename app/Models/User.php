<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['name', 'email', 'password', 'points', 'phone_number', 'google_id'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */


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

    public function addPoints($points, $description = null)
    {
        $this->points += $points;
        $this->save();

        $this->transactions()->create([
            'type' => 'add',
            'points' => $points,
            'description' => $description,
        ]);
    }

    // استرداد النقاط
    public function redeemPoints($points, $description = null)
    {
        if ($this->points >= $points) {
            $this->points -= $points;
            $this->save();

            $this->transactions()->create([
                'type' => 'redeem',
                'points' => $points,
                'description' => $description,
            ]);
        } else {
            throw new \Exception("Not enough points to redeem.");
        }
    }

}
