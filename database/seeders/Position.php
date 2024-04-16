<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use DB;
    class Position extends Seeder {
        /**
         * Run the database seeds.
         */
        public function run(): void {
            DB::table('positions')->insert([
                ['name' => 'Head Librarian'],
                ['name' => 'Reference Librarian'],
                ['name' => 'Cataloging Specialist'],
            ]);
        }
    }


