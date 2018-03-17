<?php
/**
 * Copyright © Toxic-Lemurs. All rights reserved.
 * See license.txt for license details.
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMenuTable
 */
class CreateMenuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu', function (Blueprint $table) {
            // IDs
            $table->increments('id');
            $table->integer('group_id')->index();
            $table->integer('order')->unsigned()->default(0)->index();
            $table->integer('parent')->unsigned()->nullable()->index();

            // Core
            $table->string('title');
            $table->string('path');
            $table->boolean('active')->default(true);

            // Config
            $table->string('class')->nullable();
            $table->string('icon')->nullable();
            $table->string('small_class')->nullable();
            $table->string('small_text')->nullable();

            // Timestamps
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
        Schema::drop('menu');
    }
}
