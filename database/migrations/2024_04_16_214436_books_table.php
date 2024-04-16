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
            Schema::create('books', function (Blueprint $table) {
                $table->id();
                $table->text('book_title')->unique;
                $table->string('author');
                $table->string('isbn')->unique;
                $table->date('publication_date');
                $table->string('publisher');
                $table->string('edication');
                $table->unsignedBigInteger('genre_id');
                $table->text('cover_image');
                $table->integer('total_copies');
                $table->timestamps();
                $table->foreign('genre_id')->references('id')->on('genres');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('books');
        }
    };
