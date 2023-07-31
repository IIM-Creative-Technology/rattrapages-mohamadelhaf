<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SelectedTable; // Import the SelectedTable model

class TableController extends Controller
{
    public function saveSelectedTable(Request $request)
    {
        $request->validate([
            'selectedTableNumber' => 'required|integer', // Adjust the validation rules as per your requirements
        ]);

        $selectedTableNumber = $request->input('selectedTableNumber');

        // Save the selected table number to the database
        SelectedTable::create([
            'table_number' => $selectedTableNumber,
        ]);

        return response()->json(['message' => 'Table number saved successfully']);
    }
}
