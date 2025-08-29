<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class PacientesSeeder extends Seeder
{
    public function run(): void
    {
        for ($i = 1; $i <= 20; $i++) {
            DB::table('pacientes')->insert([
                'rut' => '12.345.67' . $i . '-K',
                'nombres' => 'Paciente ' . $i,
                'apellidos' => 'Apellido ' . $i,
                'email' => 'paciente' . $i . '@mail.com',
                'telefono' => '9' . rand(10000000, 99999999),
                'fecha_nacimiento' => Carbon::now()->subYears(rand(0, 99))->format('Y-m-d'),
                'created_at' => Carbon::now()->subDays(rand(0, 30)),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
