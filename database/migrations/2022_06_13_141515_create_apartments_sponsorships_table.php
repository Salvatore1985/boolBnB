<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApartmentsSponsorshipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('apartment_sponsorship', function (Blueprint $table) {
            $table->unsignedBigInteger('apartment_id');
            $table->foreign('apartment_id')
                     ->references('id')
                     ->on('apartments')
                     ->onDelete('cascade')
                     ->onUpdate('cascade');
            $table->date('start_date');
              /* ***** */
            $table->unsignedBigInteger('sponsorship_id');
            $table->foreign('sponsorship_id')
                    ->references('id')
                    ->on('sponsorships')
                    ->onDelete('cascade')
                    ->onUpdate('cascade');
            $table->date('end_date');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_sponsorship');

    }
}
