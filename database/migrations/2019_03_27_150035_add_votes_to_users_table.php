<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('LoaiTin', function (Blueprint $table) {
            $table->renameColumn('Ten ', 'Ten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('LoaiTin', function (Blueprint $table) {
            $table->renameColumn('Ten', 'Ten ');
        });
    }
}
