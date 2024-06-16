<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Fine extends Model {
        use HasFactory;
        protected $fillable = [
            'borrow_id', 'amount', 'paid'
        ];
        public function borrows() {
            return $this->belongsTo(Borrow::class);
        }
    }


