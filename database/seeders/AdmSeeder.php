<?php

namespace Database\Seeders;

use App\Models\Adm;
use Hamcrest\NullDescription;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdmSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Adm::create([
            'nomeAdm' => 'adm',
            'emailAdm' => 'adm@gmail.com',
            'password' => bcrypt('123'),
            'fotoAdm' => null
        ]);
    }
}
