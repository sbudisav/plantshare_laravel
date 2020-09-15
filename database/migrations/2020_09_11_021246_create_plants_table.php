<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlantsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plants', function (Blueprint $table) {
            $table->id();
            $table->char('name', 100);
            $table->char('bionominal', 100);
            $table->text('description');
            $table->unsignedTinyInteger('water_freq');
            $table->unsignedTinyInteger('sun_pref');
            $table->timestamps();
        });

        Schema::create('user_plants', function (Blueprint $table) {
            $table->id();
            $table->char('nickname', 100);
            $table->timestamps();
            
            $table->foreignId('plant_id')
                ->references('id')
                ->on('plants')
                ->onDelete('cascade');

            $table->foreignId('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('plants');
    }
}
