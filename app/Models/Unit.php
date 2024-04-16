<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Unit extends Model {
        use HasFactory;
        protected $fillable = [
            'name', 'unit_abbreviation'
        ];
        public function programmes() {
            return $this->hasMany(Programme::class);
        }
    }
