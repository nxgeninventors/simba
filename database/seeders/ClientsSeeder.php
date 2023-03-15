<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use App\Models\Clients;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ClientsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Clients::factory()->count(20)->create();

    }
}
