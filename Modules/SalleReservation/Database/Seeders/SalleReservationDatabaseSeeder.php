<?php

namespace Modules\SalleReservation\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class SalleReservationDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // $this->call("OthersTableSeeder");
        
        $this->call(RoomTableSeeder::class);
        $this->call(ReservationTableSeeder::class);
    }
}
