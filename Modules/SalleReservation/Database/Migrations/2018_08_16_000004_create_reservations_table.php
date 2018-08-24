<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReservationsTable extends Migration
{
    /**
     * Schema table name to migrate
     * @var string
     */
    public $set_schema_table = 'reservations';

    /**
     * Run the migrations.
     * @table reservations
     *
     * @return void
     */
    public function up()
    {
        if (Schema::hasTable($this->set_schema_table)) return;
        Schema::create($this->set_schema_table, function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->mediumText('description');
            $table->boolean('day');
            $table->timestamp('start')->nullable();
            $table->timestamp('finish')->nullable();
            $table->unsignedInteger('rooms_id');
            $table->unsignedInteger('users_id');
            $table->increments('id');

            $table->index(["rooms_id"], 'fk_Reservation_rooms1_idx');

            $table->index(["users_id"], 'fk_Reservation_users_idx');
            $table->softDeletes();
            $table->timestamps();


            $table->foreign('users_id', 'fk_Reservation_users_idx')
                ->references('id')->on('users')
                ->onDelete('no action')
                ->onUpdate('no action');

            $table->foreign('rooms_id', 'fk_Reservation_rooms1_idx')
                ->references('id')->on('rooms')
                ->onDelete('no action')
                ->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
     public function down()
     {
       Schema::dropIfExists($this->set_schema_table);
     }
}
