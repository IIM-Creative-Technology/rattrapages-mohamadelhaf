<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SelectedTable;

class TableController extends Controller
{
    /**
     * Get the list of tables.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTables()
    {
        $tableNumbers = SelectedTable::pluck('table_number')->toArray();
        return response()->json($tableNumbers);
    }
    

    /**
     * Reserve a table.
     *
     * @param  int  $tableNumber
     * @return \Illuminate\Http\JsonResponse
     */
    public function reserveTable($tableNumber)
    {
        $selectedTable = SelectedTable::where('table_number', $tableNumber)->firstOrFail();
    
        if (!$selectedTable->is_reserved) {
            $selectedTable->update([
                'is_reserved' => true,
                'reserved_at' => now(), // Update with the current timestamp
            ]);
    
            return response()->json(['message' => "Table {$selectedTable->table_number} reserved successfully"]);
        }
    
        return response()->json(['message' => "Table {$selectedTable->table_number} is already reserved"]);
    }
}
