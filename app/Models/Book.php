<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Book extends Model {
        use HasFactory;
        protected $fillable = [
            'book_title', 'author', 'isbn', 'publisher', 'publication_date', 'edication', 'genre_id', 'cover_image', 'total_copies', 'genre_id'
        ];
        public function genres() {
            return $this->belongsTo(Genre::class);
        }
        public function borrows() {
            return $this->hasMany(Borrow::class);
        }
    }
