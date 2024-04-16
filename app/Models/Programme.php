<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Programme extends Model {
        use HasFactory;
        protected $fillable = [
            'name', 'programme_abbreviation', 'unit_id'
        ];
        public function students(){
            return $this->hasMany(Student::class);
        }
        public function units() {
            return $this->belongsTo(Unit::class);
        }
    }
