<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use DB;
    class Genre extends Seeder {
        /**
         * Run the database seeds.
         */
        public function run(): void {
            DB::table('genres')->insert([
                ['name' => 'fiction'],
                ['name' => 'non-fiction'],
                ['name' => 'mystery'],
                ['name' => 'science fiction'],
                ['name' => 'romance'],
                ['name' => 'Recerved Book'],
                ['name' => 'academic'],
            ]);
        }
    }


