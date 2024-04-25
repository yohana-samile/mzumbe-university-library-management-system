<?php
    use Illuminate\Database\Migrations\Migration;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Support\Facades\Schema;

    return new class extends Migration
    {
        /**
         * Run the migrations.
         */
        public function up(): void {
            Schema::create('borrows', function (Blueprint $table) {
                $table->id();
                $table->boolean('returned')->default(false);
                $table->date('toBeReturnedOn');
                $table->unsignedBigInteger('book_id');
                $table->unsignedBigInteger('user_id');
                $table->string('borrow_status')->default('pending');
                $table->string('return_status')->default('not return');
                $table->timestamps();
                $table->foreign('book_id')->references('id')->on('books');
                $table->foreign('user_id')->references('id')->on('users');
            });
        }

        /**
         * Reverse the migrations.
         */
        public function down(): void
        {
            Schema::dropIfExists('borrows');
        }
    };
