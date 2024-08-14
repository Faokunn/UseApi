<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->string('Item');
            $table->string('UpperSize');
            $table->string('LowerSize');
            $table->string('BookName');
            $table->string('SubjectCode');
            $table->string('SubjectDesc');
            $table->bigInteger('stu_id')->unsigned();
            $table->foreign('stu_id')->references('id')->on('users');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
