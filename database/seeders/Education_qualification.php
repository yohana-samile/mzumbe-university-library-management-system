<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use DB;
    class Education_qualification extends Seeder {
        /**
         * Run the database seeds.
         */
        public function run(): void {
            DB::table('education_qualifications')->insert([
                ['name' => 'Degree'],
                ['name' => 'Diploma'],
            ]);
        }
    }


