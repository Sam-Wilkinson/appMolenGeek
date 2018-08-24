<?php

namespace Modules\SalleReservation\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Reservation extends Model
{
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description'
    ];

     /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = [
        'deleted_at'
    ];

    public function user()
    {
        return $this->belongsTo('Modules\SalleReservation\Entities\User', 'users_id', 'id');
    }
    public function room()
    {
        return $this->belongsTo('Modules\SalleReservation\Entities\Room', 'rooms_id', 'id');
    }
}
