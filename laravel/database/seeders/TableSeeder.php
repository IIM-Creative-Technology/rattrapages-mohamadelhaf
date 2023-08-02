<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SelectedTable;

class TableSeeder extends Seeder
{
    public function run()
    {
        // Clear existing records (if any) to avoid duplicates
        SelectedTable::truncate();

        // Seed the database with table numbers
        $tableNumbers = range(1, 10);

        foreach ($tableNumbers as $tableNumber) {
            SelectedTable::create([
                'table_number' => $tableNumber,
            ]);
        }
    }
}
