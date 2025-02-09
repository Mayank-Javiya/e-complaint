<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('desc')->nullable();
            $table->string('photo')->nullable();
            $table->integer('status')->nullable(); // 0 : pending, 1 : review , 2 : solved , 3 : rejected
            $table->unsignedBigInteger('u_id')->nullable();
            $table->unsignedBigInteger('dept_id')->nullable();

            $table->foreign('u_id')->references('id')->on('users');
            $table->foreign('dept_id')->references('id')->on('departments');
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
        Schema::dropIfExists('complaints');
    }
};
