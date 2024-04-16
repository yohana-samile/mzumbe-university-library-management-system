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
            Schema::create('programmes', function (Blueprint $table) {
                $table->id();
                $table->string('name');
                $table->string('programme_abbreviation');
                $table->unsignedBigInteger('unit_id');
                $table->timestamps();
                $table->foreign('unit_id')->references('id')->on('units');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('programmes');
        }
    };

