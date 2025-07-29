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
        Schema::create('student_faq_languages', function (Blueprint $table) {
            $table->id();
            $table->string('lang', 50)->nullable();
            $table->string('question');
            $table->text('answer');
            $table->unsignedBigInteger('faq_id')->nullable();
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
        Schema::dropIfExists('student_faq_languages');
    }
};
