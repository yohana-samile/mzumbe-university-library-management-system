<?php
    namespace App\Models;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Database\Eloquent\Model;

    class Event_and_announcement extends Model {
        use HasFactory;
        protected $fillable = [
            'name', 'event_image'
        ];
    }
