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
            Schema::create('librarians', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->unsignedBigInteger('education_qualification_id');
                $table->unsignedBigInteger('libary_depertment_id');
                $table->unsignedBigInteger('position_id');
                $table->timestamps();
                $table->foreign('user_id')->references('id')->on('users');
                $table->foreign('education_qualification_id')->references('id')->on('education_qualifications');
                $table->foreign('libary_depertment_id')->references('id')->on('libary_depertments');
                $table->foreign('position_id')->references('id')->on('positions');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('librarians');
        }
    };
