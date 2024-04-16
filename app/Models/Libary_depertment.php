<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Libary_depertment extends Model {
        use HasFactory;
        protected $fillable = [
            'name'
        ];
        public function librarians(){
            return $this->hasOne(Librarian::class);
        }
    }

