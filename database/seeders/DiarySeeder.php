<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use DateTime;

class DiarySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('diaries')->insert([
            'title' => 'Went on a Picnic',
            'content' => 'I went on a picnic. It was really nice.',
            'photo' => 'Picnic',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
        DB::table('diaries')->insert([
            'title' => 'Went shopping',
            'content' => 'I went shopping. It was really nice.',
            'photo' => 'shopping',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
        DB::table('diaries')->insert([
            'title' => 'Went fishing',
            'content' => 'I went fishing. It was really nice.',
            'photo' => 'fishing',
            'created_at' => new DateTime(),
            'updated_at' => new DateTime()
        ]);
    }
}
