<?php

namespace Database\Seeders;

use App\Models\Quiz;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuizzesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Quiz::create([
            'user_id' => 1,
            'question' => '日本の首都は？',
            'option_a' => '東京',
            'option_b' => '京都',
            'option_c' => '大阪',
            'option_d' => '北海道',
            'correct_option' => 'option_a',
            'explanation' => '日本の首都は東京です。',
        ]);

        Quiz::create([
            'user_id' => 1,
            'question' => '「赤い惑星」として知られているのは？',
            'option_a' => '地球',
            'option_b' => '火星',
            'option_c' => '木星',
            'option_d' => '土星',
            'correct_option' => 'option_b',
            'explanation' => '火星は見た目が赤いことから「赤い惑星」と呼ばれています。',
        ]);
    }
}
