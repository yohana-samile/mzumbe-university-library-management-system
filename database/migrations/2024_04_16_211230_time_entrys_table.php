<?php

    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration {
        /**
         * Run the migrations.
         */
        public function up(): void
        {
            Schema::create('time_entrys', function (Blueprint $table) {
                $table->id();
                $table->unsignedBigInteger('user_id');
                $table->timestamp('time_in');
                $table->timestamp('time_out');
                $table->timestamps();
                $table->foreign('user_id')->references('id')->on('users');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('time_entrys');
        }
    };
