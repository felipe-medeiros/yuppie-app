<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('turmas')->insert(['nome' => 'PHP']);
        DB::table('turmas')->insert(['nome' => 'Java']);
        DB::table('turmas')->insert(['nome' => 'Ruby']);
    }
}
