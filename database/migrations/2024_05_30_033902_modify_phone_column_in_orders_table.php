<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            // Check if the phone column exists, if not, create it
            if (!Schema::hasColumn('orders', 'phone')) {
                $table->string('phone', 15)->nullable(); // Adjust the datatype and length as needed
            }
            // Modify the phone column
            $table->string('phone', 15)->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
};
