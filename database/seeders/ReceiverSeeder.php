<?php

namespace Database\Seeders;

use App\Models\Receiver;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ReceiverSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Receiver::query()->delete();

        $receivers = [
            [
                'email' => 'blendbarometer.test@gmail.com',
                'is_default' => true,
            ],
        ];

        Receiver::insert($receivers);
    }
}
