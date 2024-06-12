<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tecnology;

class TecnologySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tecnologies = ['css', 'scss', 'js', 'vue', 'sql', 'php', 'laravel'];

        foreach ($tecnologies as $tech_name) {
            $new_tech = new Tecnology();
            $new_tech->name = $tech_name;

            $new_tech->save();
        }
    }
}
