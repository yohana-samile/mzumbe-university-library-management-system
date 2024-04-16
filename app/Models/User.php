<?php
    namespace App\Models;

    // use Illuminate\Contracts\Auth\MustVerifyEmail;
    use Illuminate\Database\Eloquent\Factories\HasFactory;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Illuminate\Notifications\Notifiable;
    use Laravel\Sanctum\HasApiTokens;

    class User extends Authenticatable {
        use HasApiTokens, HasFactory, Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array<int, string>
         */
        protected $fillable = [
            'name',  'email', 'password', 'gender', 'phone_number', 'physical_address', 'role_id'
        ];

        /**
         * The attributes that should be hidden for serialization.
         *
         * @var array<int, string>
         */
        protected $hidden = [
            'password', 'remember_token',
        ];

        /**
         * The attributes that should be cast.
         *
         * @var array<string, string>
         */
        protected $casts = [
            'email_verified_at' => 'datetime', 'password' => 'hashed',
        ];
        public function librarians(){
            return $this->hasOne(Librarian::class);
        }
        public function students(){
            return $this->hasOne(Student::class);
        }
        public function borrows() {
            return $this->hasMany(Borrow::class);
        }
        public function time_entrys() {
            return $this->hasMany(Time_entry::class);
        }
        public function roles() {
            return $this->BelongsTo(Role::class);
        }
        public function over_all_users(){
            return $this->hasMany(Over_all_user::class);
        }
    }

