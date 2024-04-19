<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use DB;
    class Year_of_study extends Seeder {
        /**
         * Run the database seeds.
         */
        public function run(): void {
            DB::table('year_of_studies')->insert([
                ['name' => 'First'],
                ['name' => 'Second'],
                ['name' => 'Third'],
            ]);
        }
    }
