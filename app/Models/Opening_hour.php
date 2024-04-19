<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Opening_hour extends Model {
        use HasFactory;
        protected $fillable = ['day', 'open', 'close', 'holiday'];
    }
