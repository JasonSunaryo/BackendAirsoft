<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up()
{
    Schema::table('stock_logs', function (Blueprint $table) {
        $table->decimal('profit', 10, 2)->default(0); // Adjust the data type and default value as per your requirements
    });
}

};
