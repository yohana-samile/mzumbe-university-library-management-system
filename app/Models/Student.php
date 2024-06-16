<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Student extends Model {
        use HasFactory;
        protected $fillable = [
            'dob', 'regstration_number', 'year_of_study_id', 'programme_id', 'user_id'
            // 'guardian_id', 'medical_information_id', 'dob', 'regstration_number', 'year_of_study_id', 'programme_id'
        ];

        public function guardians(){
            return $this->hasOne(Guardian::class);
        }
        public function medical_informations(){
            return $this->hasOne(Medical_information::class);
        }
        public function year_of_study(){
            return $this->belongsTo(Year_of_study::class);
        }
        public function programmes(){
            return $this->belongsTo(Programme::class);
        }
        public function users(){
            return $this->belongsTo(User::class);
        }
    }
