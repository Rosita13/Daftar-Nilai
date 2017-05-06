<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateValuesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     Schema::create('values', function (Blueprint $table) {
            $table->string('id');
            $table->integer('siswa_id' , false);
            $table->string('type');
            $table->string('status');
            $table->integer('nilai');
            $table->string('semester');
            $table->integer('mapel_id', false);
            $table->integer('class_id', false);
            $table->timestamps();
            $table->softDeletes();
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::drop('values');
    }
}
