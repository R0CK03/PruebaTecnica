<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndicatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            //Indicador: Huella de Carbono (Ton CO2)
            ['name' => 'Huella de Carbono', 'type' => 'carbono', 'value' => 120.5, 'measured_at' => '2025-01-01'],
            ['name' => 'Huella de Carbono', 'type' => 'carbono', 'value' => 115.2, 'measured_at' => '2025-02-01'],
            ['name' => 'Huella de Carbono', 'type' => 'carbono', 'value' => 118.0, 'measured_at' => '2025-03-01'],
            ['name' => 'Huella de Carbono', 'type' => 'carbono', 'value' => 110.4, 'measured_at' => '2025-04-01'],
            ['name' => 'Huella de Carbono', 'type' => 'carbono', 'value' => 105.0, 'measured_at' => '2025-05-01'],
            ['name' => 'Huella de Carbono', 'type' => 'carbono', 'value' => 125.8, 'measured_at' => '2025-06-01'],
            ['name' => 'Huella de Carbono', 'type' => 'carbono', 'value' => 130.2, 'measured_at' => '2025-07-01'],
            ['name' => 'Huella de Carbono', 'type' => 'carbono', 'value' => 128.0, 'measured_at' => '2025-08-01'],
            ['name' => 'Huella de Carbono', 'type' => 'carbono', 'value' => 122.5, 'measured_at' => '2025-09-01'],
            ['name' => 'Huella de Carbono', 'type' => 'carbono', 'value' => 115.0, 'measured_at' => '2025-10-01'],
            ['name' => 'Huella de Carbono', 'type' => 'carbono', 'value' => 110.2, 'measured_at' => '2025-11-01'],
            ['name' => 'Huella de Carbono', 'type' => 'carbono', 'value' => 108.5, 'measured_at' => '2025-12-01'],
            
            //Indicador: COnsumo Agua (m3)
            ['name' => 'Consumo de Agua', 'type' => 'agua', 'value' => 450, 'measured_at' => '2025-01-01'],
            ['name' => 'Consumo de Agua', 'type' => 'agua', 'value' => 430, 'measured_at' => '2025-02-01'],
            ['name' => 'Consumo de Agua', 'type' => 'agua', 'value' => 460, 'measured_at' => '2025-03-01'],
            ['name' => 'Consumo de Agua', 'type' => 'agua', 'value' => 410, 'measured_at' => '2025-04-01'],
            ['name' => 'Consumo de Agua', 'type' => 'agua', 'value' => 390, 'measured_at' => '2025-05-01'],
            ['name' => 'Consumo de Agua', 'type' => 'agua', 'value' => 500, 'measured_at' => '2025-06-01'],
            ['name' => 'Consumo de Agua', 'type' => 'agua', 'value' => 520, 'measured_at' => '2025-07-01'],
            ['name' => 'Consumo de Agua', 'type' => 'agua', 'value' => 510, 'measured_at' => '2025-08-01'],
            ['name' => 'Consumo de Agua', 'type' => 'agua', 'value' => 480, 'measured_at' => '2025-09-01'],
            ['name' => 'Consumo de Agua', 'type' => 'agua', 'value' => 440, 'measured_at' => '2025-10-01'],
            ['name' => 'Consumo de Agua', 'type' => 'agua', 'value' => 415, 'measured_at' => '2025-11-01'],
            ['name' => 'Consumo de Agua', 'type' => 'agua', 'value' => 400, 'measured_at' => '2025-12-01'],
            ];

            foreach ($data as $item){
            \App\Models\Indicator::create([
                'name' => $item['name'],
                'type' => $item['type'],
                'value' => $item['value'],
                'measured_at' => $item['measured_at'],
            ]);
        }
            }
    }
