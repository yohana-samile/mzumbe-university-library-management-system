<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Time_entry extends Model {
        use HasFactory;
        protected $fillable = [
            'user_id', 'time_in', 'time_out'
        ];
        public function users() {
            return $this->belongsTo(User::class);
        }
    }
