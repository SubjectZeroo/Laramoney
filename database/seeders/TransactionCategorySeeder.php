<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TransactionCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('transaction_categories')->insert([
            [
                'name' => 'Income'
            ],
            [
                'name' => 'Expense'
            ],
            [
                'name' => 'Upcoming Income'
            ],
            [
                'name' => 'Upcoming Expense'
            ]
        ]);
    }
}
