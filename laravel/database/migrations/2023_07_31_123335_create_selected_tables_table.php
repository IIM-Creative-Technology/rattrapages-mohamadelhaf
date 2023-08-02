<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('selected_tables', function (Blueprint $table) {
            $table->id();
            $table->integer('table_number');
            $table->boolean('is_reserved')->default(false);
            $table->timestamp('reserved_at')->nullable(); // Add the reserved_at column
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('selected_tables');
    }
};
