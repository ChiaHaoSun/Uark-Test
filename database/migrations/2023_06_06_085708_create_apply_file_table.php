<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apply_file', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->comment('使用者ID');
            $table->text('file_path')->comment('檔案路徑');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `apply_file` comment '申請附檔'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apply_file');
    }
};
