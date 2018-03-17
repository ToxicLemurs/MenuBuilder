<?php
/**
 * Copyright © Toxic-Lemurs. All rights reserved.
 * See license.txt for license details.
 */

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

/**
 * Class CreateMenuGroupTable
 */
class CreateMenuGroupTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menu_group', function (Blueprint $table) {
            // IDs
            $table->increments('id');

            // Core
            $table->string('name')->index();

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
        Schema::drop('menu_group');
    }
}
