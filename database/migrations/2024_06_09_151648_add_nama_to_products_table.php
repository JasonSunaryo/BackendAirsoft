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
         // Pastikan migrasi ini hanya menambahkan kolom 'nama' ke tabel 'products'
         Schema::table('products', function (Blueprint $table) {
             $table->string('nama')->nullable(); // Atau sesuai dengan kebutuhan Anda
         });
     }
 
     /**
      * Reverse the migrations.
      */
     public function down(): void
     {
         Schema::table('products', function (Blueprint $table) {
             $table->dropColumn('nama');
         });
     }
 };
 