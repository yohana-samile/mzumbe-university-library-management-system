<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Borrow extends Model
    {
        use HasFactory;
        protected $fillable = [
            'user_id', 'book_id'
        ];
        public function users() {
            return $this->belongsTo(User::class);
        }
        public function books() {
            return $this->belongsTo(Book::class);
        }
    }
