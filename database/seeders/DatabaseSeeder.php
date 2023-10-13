<?php

namespace Database\Seeders;

use App\Models\PaymentAdd;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        PaymentAdd::factory()->create([]);

        PaymentAdd::factory()->create([
            'name' => 'Ethereum',
            'symbol' => 'ETH',
            'network' => 'ETH'
        ]);

        PaymentAdd::factory()->create([
            'name' => 'Tether',
            'symbol' => 'USDT',
            'network' => 'TRC20'
        ]);

        PaymentAdd::factory()->create([
            'name' => 'Tron',
            'symbol' => 'TRX',
            'network' => 'TRC20'
        ]);
    }
}
