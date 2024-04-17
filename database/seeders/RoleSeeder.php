<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use DB;

    class RoleSeeder extends Seeder
    {
        /**
         * Run the database seeds.
         */
        public function run(): void {
            DB::table('roles')->insert([
                ['name' => 'is_admin'],
                ['name' => 'is_librarian'],
                ['name' => 'is_student'],
            ]);
        }
    }

