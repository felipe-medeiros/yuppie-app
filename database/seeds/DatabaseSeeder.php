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
        DB::table('turmas')->insert(['nome' => '1º ANO']);
        DB::table('turmas')->insert(['nome' => '2º ANO']);
        DB::table('turmas')->insert(['nome' => '3º ANO']);
        DB::table('turmas')->insert(['nome' => '4º ANO']);
    }
}
