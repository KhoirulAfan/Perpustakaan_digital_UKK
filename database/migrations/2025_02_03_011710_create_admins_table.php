<?php

use App\Models\Admin;
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
        Schema::create('admins', function (Blueprint $table) {
            $table->id();
            $table->String('nama');
            $table->String('username');
            $table->String('password');
            $table->enum('role',['petugas','admin']);
            $table->timestamps();
        });
        Admin::create(['nama' => 'admin','username' => 'admin', 'password' => 'admin','role' => 'admin']);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
