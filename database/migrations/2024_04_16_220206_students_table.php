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
            Schema::create('students', function (Blueprint $table) {
                $table->id();
                $table->date('dob');
                $table->string('regstration_number');
                $table->unsignedBigInteger('year_of_study_id');
                $table->unsignedBigInteger('programme_id');
                $table->unsignedBigInteger('user_id');
                $table->timestamps();
                $table->foreign('year_of_study_id')->references('id')->on('year_of_studies');
                $table->foreign('user_id')->references('id')->on('users');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('students');
        }
    };

