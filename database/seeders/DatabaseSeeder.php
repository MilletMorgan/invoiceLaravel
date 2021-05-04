<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Organisation;
use App\Models\Mission;
use App\Models\MissionLine;
use App\Models\Contribution;
use App\Models\Transaction;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $organisation = Organisation::factory()
            ->has(
                Mission::factory()
                    ->count(5)
                    ->has(
                        MissionLine::factory()
                            ->count(rand(1, 5)),
                        'missionLines'
                    )
                    /*->has(
                        Transaction::factory()
                            ->count(3)
                    )*/
            )
            /*->has(
                Contribution::factory()
            )*/
            ->create();
    }
}
