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
        Schema::create('relawans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('agama_id');
            $table->foreignId('jenis_kelamin_id');
            $table->string('nama', 50);
            $table->string('np', 15);
            $table->date('tl');
            $table->string('nowa', 25);
            $table->text('foto')->nullable();
            $table->text('alamat');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('relawans');
    }
};
