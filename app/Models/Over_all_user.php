<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Over_all_user extends Model {
        use HasFactory;
        protected $fillable = [
            'user_id'
        ];
        public function users(){
            return $this->belongsTo(User::class);
        }
    }
