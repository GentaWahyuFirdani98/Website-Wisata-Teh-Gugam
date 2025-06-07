<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::table('jenis_penyakits', function (Blueprint $table) {
            $table->dropColumn('solusi');
        });
    }

    public function down(): void {
        Schema::table('jenis_penyakits', function (Blueprint $table) {
            $table->text('solusi')->nullable(); // Jika ingin restore
        });
    }
};

