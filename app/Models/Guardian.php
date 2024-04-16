<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Guardian extends Model {
        use HasFactory;
        protected $fillable = [
            'name', 'address', 'phone_number', 'student_id'
        ];

        public function students() {
            return $this->belongsTo(Student::class);
        }
    }
