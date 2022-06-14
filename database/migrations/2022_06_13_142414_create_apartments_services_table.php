<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


class CreateApartmentsServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartments_services', function (Blueprint $table) {
            $table->unsignedBigInteger('apartment_id')
            ;
            $table->foreign('apartment_id')
                    ->references('id')
                    ->on('apartments')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
                    /* ***** */
            $table->unsignedBigInteger('service_id');
            $table->foreign('service_id')
                    ->references('id')
                    ->on('services')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments_services');
    }
}
