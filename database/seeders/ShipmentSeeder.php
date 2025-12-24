<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Shipment;
use App\Models\StatusLog;
use Faker\Factory as Faker;
use Carbon\Carbon;

class ShipmentSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();

        $locations = ['New York', 'Los Angeles', 'Chicago', 'Houston', 'Miami'];

        for ($i = 0; $i < 100; $i++) {


            $finalStatus = $faker->randomElement([
                'Pending',
                'In Transit',
                'Delivered'
            ]);

            $baseDate = Carbon::now()->subDays(rand(3, 10));

            $pendingAt = (clone $baseDate)->setTime(
                            rand(0, 5),       
                            rand(0, 59)       
                        );

            $inTransitAt = (clone $pendingAt)->addHours(rand(8, 10));

            $deliveredAt = (clone $inTransitAt)
                            ->addDay()
                            ->setTime(
                                rand(1, 6),   
                                rand(0, 59)
                            );

            $shipment = Shipment::create([
                'tracking_number'   => strtoupper($faker->bothify('??#####')),
                'sender_name'       => $faker->name(),
                'sender_address'    => $faker->address(),
                'receiver_name'     => $faker->name(),
                'receiver_address'  => $faker->address(),
                'destination_city'  => $faker->city(),
                'status'            => $finalStatus,
                'created_at'        => $pendingAt,
            ]);

            StatusLog::create([
                'shipment_id' => $shipment->id,
                'status'      => 'Pending',
                'location'    => $faker->randomElement($locations),
                'created_at'  => $pendingAt,
            ]);

            if (in_array($finalStatus, ['In Transit', 'Delivered'])) {
                StatusLog::create([
                    'shipment_id' => $shipment->id,
                    'status'      => 'In Transit',
                    'location'    => $faker->randomElement($locations),
                    'created_at'  => $inTransitAt,
                ]);
            }

            if ($finalStatus === 'Delivered') {
                StatusLog::create([
                    'shipment_id' => $shipment->id,
                    'status'      => 'Delivered',
                    'location'    => $faker->randomElement($locations),
                    'created_at'  => $deliveredAt,
                ]);
            }
        }
    }
}
