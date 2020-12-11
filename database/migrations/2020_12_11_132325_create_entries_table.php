<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntriesTable extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('entries', function (Blueprint $table) {
            $table->id();
            $table->string("full_name", 255);
            $table->string("phone_number", 15);
            $table->double("temperature", 15, 2);
            $table->datetime('checkin_date');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('entries');
    }
}
