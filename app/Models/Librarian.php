<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Librarian extends Model  {
        use HasFactory;
        protected $fillable = [
            'user_id', 'education_qualification_id', 'libary_depertment_id', 'position_id', 'employeeId',
        ];
        public function users(){
            return $this->belongsTo(User::class);
        }
        public function education_qualifications(){
            return $this->hasMany(Education_qualification::class);
        }
        public function libary_depertments(){
            return $this->belongsTo(Libary_depertment::class);
        }
        public function positions(){
            return $this->belongsTo(Position::class);
        }
    }

