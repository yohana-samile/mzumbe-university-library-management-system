<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Medical_information extends Model {
        use HasFactory;
        protected $fillable = [
            'medical_information'
        ];
        public function students(){
            return $this->belongsTo(Student::class);
        }
    }
