<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Language;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'name' => 'PHP',
            'description' => 'Language PHP'
        ]);
        Language::create([
            'name' => 'JAVASCRIPT',
            'description' => 'Language JAVASCRIPT'
        ]);
        Language::create([
            'name' => 'TYPESCRIPT',
            'description' => 'Language TYPESCRIPT'
        ]);
        Language::create([
            'name' => 'PYTON',
            'description' => 'Language PYTON'
        ]);
        Language::create([
            'name' => 'JAVA',
            'description' => 'Language JAVA'
        ]);
    }
}
