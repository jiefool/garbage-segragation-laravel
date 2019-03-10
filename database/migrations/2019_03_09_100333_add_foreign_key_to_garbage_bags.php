<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddForeignKeyToGarbageBags extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('garbage_bags', function (Blueprint $table) {
            $table->unsignedInteger('garbage_type_id');

            $table->foreign('garbage_type_id')->references('id')->on('garbage_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('garbage_bags', function (Blueprint $table) {
            $table->dropForeign(['garbage_type_id']);
            $table->dropColumn('garbage_type_id');
        });
    }
}
