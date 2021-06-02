<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Opportunity;
use App\Models\OpportunityDetail;

class OpportunitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Opportunity::factory()
                    ->count(300)
                    ->has(OpportunityDetail::factory()->count(1), 'detail')
                    ->create();
    }
}
