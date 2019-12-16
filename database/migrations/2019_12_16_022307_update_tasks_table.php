<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateTasksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tasks', function (Blueprint $table) { 
            $table->string('name');
            $table->string('email')->nullable();
            $table->integer('phone')->nullable();
            $table->string('address')->nullable();
          


        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {

            $table->dropColumn('name');
            $table->dropColumn('email');
            $table->dropColumn('phone');
            $table->dropColumn('address');
            
           
        });
    }
}
