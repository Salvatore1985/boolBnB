<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->string('address')->nullable(false);
            $table->tinyInteger('n_rooms')->default(1);
            //$table->string('structure_type',50)->nullable(false);
            $table->text('description');
           // $table->string('category')->nullable(false);
            $table->float('sqr_meters', 10, 2);
            $table->tinyInteger('n_beds')->default(1);
            $table->tinyInteger('n_bathrooms')->default(1);
            $table->tinyInteger('n_floor')->nullable();
            $table->float('lat', 6, 4);
            $table->float('long', 6, 4);
            $table->string('title',50)->nullable();
            $table->boolean('is_visible');
            $table->float('price', 8, 2)->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
}
