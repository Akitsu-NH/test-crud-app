<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorktimesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('worktimes', function (Blueprint $table) {
            $table->id()->comment('勤務時間ID');
            $table->date('day')->comment('出勤日');
            $table->dateTime('in_time')->comment('退勤時間')->nullable();
            $table->dateTime('out_time')->comment('退勤時間')->nullable();
            $table->tinyInteger('work_status')->length(1)->comment('勤務状態');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('worktimes');
    }
}
