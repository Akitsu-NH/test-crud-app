<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorklocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worklocations', function (Blueprint $table) {
            $table->id()->comment('勤務地ID');
            $table->bigInteger('worktime_id')->comment('勤務時間ID');
            $table->text('location_url')->comment('勤務地URL')->nullable();;
            $table->text('memo')->comment('勤務地MEMO')->nullable();;
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worklocations');
    }
}
