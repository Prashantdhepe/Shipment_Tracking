<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shipment;
use App\Models\StatusLog;
use Faker\Factory as Faker;

class ShipmentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $statuses = ['Pending', 'In Transit', 'Delivered'];
        $locations = ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Miami'];

        for ($i = 0; $i < 100; $i++) {
            // Create Shipment
            $shipment = Shipment::create([
                'tracking_number' => strtoupper($faker->bothify('??#####')),
                'sender_name' => $faker->name(),
                'sender_address' => $faker->address(),
                'receiver_name' => $faker->name(),
                'receiver_address' => $faker->address(),
                'status' => $faker->randomElement($statuses),
            ]);

            // Create 2-5 Status Logs per shipment
            $statusCount = rand(2, 5);
            $lastTime = now()->subDays(rand(1, 10));

            for ($j = 0; $j < $statusCount; $j++) {
                StatusLog::create([
                    'shipment_id' => $shipment->id,
                    'status' => $faker->randomElement($statuses),
                    'location' => $faker->randomElement($locations),
                    'created_at' => $lastTime->addHours(rand(2, 24)),
                ]);
            }
        }
    }
}
