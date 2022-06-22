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
            $table->text('description');
            $table->float('sqr_meters', 10, 2);
            $table->tinyInteger('n_beds')->default(1);
            $table->tinyInteger('n_bathrooms')->default(1);
            $table->string('lat');
            $table->string('long');
            $table->string('title',100)->nullable();
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
