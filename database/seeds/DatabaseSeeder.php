<?php

use Illuminate\Database\Eloquent\Model;
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
        Model::unguard();

//        $this->call('UserTableSeeder');
//        $this->call('DefinitionTableSeeder');
//        $this->call('WordTableSeeder');
        $this->call('LetterTableSeeder');


        Model::reguard();
    }
}
