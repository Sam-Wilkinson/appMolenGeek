<?php

namespace Modules\SalleReservation\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use DB;

class RoomTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('rooms')->insert([
            [
                'name' => 'DeadPool',
                'slug' => 'DP',
                'size' => 7
            ],
            [
                'name' => 'Onizuka',
                'slug' => 'Oni',
                'size' => 20
            ],
            [
                'name' => 'Joker',
                'slug' => 'JK',
                'size' => 20
            ],
            [
                'name' => 'Star Wars',
                'slug' => 'SW',
                'size' => 18
            ],
            [
                'name' => 'Reunion',
                'slug' => 'RN',
                'size' => 40
            ],
            [
                'name' => 'Aqaurium',
                'slug' => 'AQ',
                'size' => 6
            ],
        ]);
        
    }
}
