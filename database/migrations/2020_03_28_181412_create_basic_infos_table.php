<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBasicInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('basic_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('stock_id');
            $table->string('company', 255)->nullable();
            $table->string('industry', 255)->nullable();
            $table->string('start_time', 255)->nullable();
            $table->string('IPO', 255)->nullable();
            $table->string('Chairman', 255)->nullable();
            $table->string('capital', 255)->nullable();
            $table->string('publiccommon_stock', 255)->nullable();
            $table->string('common_stock', 255)->nullable();
            $table->string('preferred_stock', 255)->nullable();
            $table->string('investman', 255)->nullable();
            $table->string('Main_business', 255)->nullable();
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
        Schema::dropIfExists('basic_infos');
    }
}
