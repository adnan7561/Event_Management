<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Type::create([
            'name' => 'Concert',
        ]);
        Type::create([
            'name' => 'Charity',
        ]);
        Type::create([
            'name' => 'Prayer',
        ]);
    }
}
