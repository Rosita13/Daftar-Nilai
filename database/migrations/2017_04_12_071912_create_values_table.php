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
            $table->uuid('id');
            $table->uuid('siswa_id');
            $table->integer('nis');
            $table->string('type');
            $table->string('status');
            $table->integer('nilai');
            $table->string('semester');
            $table->uuid('mapel_id');
            $table->uuid('class_id');
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
