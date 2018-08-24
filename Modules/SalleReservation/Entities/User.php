<?php

namespace Modules\SalleReservation\Entities;

use Illuminate\Database\Eloquent\Model;
use App\User as UserModel;

class User extends UserModel
{
    protected $fillable = [];

    public function reservations()
    {
        return $this->hasMany('Modules\SalleReservation\Entities\Reservation', 'users_id', 'id');
    }
}
