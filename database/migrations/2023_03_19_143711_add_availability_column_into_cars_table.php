<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAvailabilityColumnIntoCarsTable extends Migration
{
    
    public function up()
    {
        Schema::table('cars', function (Blueprint $table) {

        $table->string('avail')->after('rent');

        });
    }
    public function down()
    {
        //
    }
}
