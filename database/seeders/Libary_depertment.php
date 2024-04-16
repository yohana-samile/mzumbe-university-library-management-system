<?php
    namespace Database\Seeders;
    use Illuminate\Database\Console\Seeds\WithoutModelEvents;
    use Illuminate\Database\Seeder;
    use DB;
    class Libary_depertment extends Seeder {
        /**
         * Run the database seeds.
         */
        public function run(): void {
            DB::table('libary_depertments')->insert([
                ['name' => 'circulation'],
                ['name' => 'reference'],
                ['name' => 'technical services'],
                ['name' => 'other'],
            ]);
        }
    }
