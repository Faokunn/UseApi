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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('FirstName');
            $table->string('LastName');
            $table->string('Course');
            $table->string('Department');
            $table->string('hasUUniform');
            $table->string('hasLUniform');
            $table->string('hasRSO');
            $table->string('hasBooks');
            $table->integer('Year');
            $table->string('Status');
            $table->string('stu_id');
            $table->foreign('stu_id')->references('studentId')->on('students')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
