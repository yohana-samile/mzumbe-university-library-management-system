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
            Schema::create('opening_hours', function (Blueprint $table) {
                $table->id();
                $table->time('open')->nullable();
                $table->time('close')->nullable();
                $table->boolean('holiday')->default(false);
                $table->timestamps();
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('opening_hours');
        }
    };

