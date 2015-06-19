<?php

use App\Letter;
use Illuminate\Database\Seeder;

class LetterTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $azRange = range('A', 'Z');
        foreach ($azRange as $letter) {
            $l = new Letter();
            $l->letter = $letter;
            $l->save();
        }
    }
}
