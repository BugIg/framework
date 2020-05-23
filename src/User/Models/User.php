<?php

namespace AvoRed\Framework\User\Models;

use AvoRed\Framework\Order\Models\Order;
use AvoRed\Framework\Support\BaseModel;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\ClientRepository;
use Laravel\Passport\HasApiTokens;

class User extends BaseModel
{
    use Notifiable, HasApiTokens;
   /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function addresses()
    {
        return $this->hasMany(Address::class);
    }
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Get the Passport Client for User and If it doesnot exist then create a new one.
     * @return \Laravel\Passport\Client $client
     */
    public function getPassportClient()
    {
        $client = $this->clients->first();
        if (null === $client) {
            $clientRepository = app(ClientRepository::class);

            $redirectUri = env('APP_URL');
            $client = $clientRepository->createPasswordGrantClient($this->id, $this->first_name . ' ' . $this->last_name, $redirectUri);
        }

        return $client;
    }

}
