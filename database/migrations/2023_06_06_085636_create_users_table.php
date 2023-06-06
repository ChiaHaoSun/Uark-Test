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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('org_id')->comment('單位ID');
            $table->string('name', 50)->comment('姓名');
            $table->date('birthday')->nullable()->comment('生日');
            $table->string('email', 255)->comment('email');
            $table->string('account', 255)->comment('帳號');
            $table->string('password', 255)->comment('密碼');
            $table->string('status', 2)->comment('審核狀態');
            $table->timestamps();
        });

        DB::statement("ALTER TABLE `users` comment '使用者'");
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
