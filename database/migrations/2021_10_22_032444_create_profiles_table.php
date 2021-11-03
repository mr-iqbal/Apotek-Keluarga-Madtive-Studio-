<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('profile');
            $table->text('address');
            $table->integer('provinsi');
            $table->integer('kecamatan');
            $table->integer('kota');
            $table->integer('desa');
            $table->string('phone');
            $table->string('waphone');
            $table->string('email');
            $table->string('website');
            $table->string('foto');
            $table->timestamp('created')->nullable();
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
        Schema::dropIfExists('profiles');
    }
}
