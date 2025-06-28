<?php

use Enterprise\Base\Enums\MigrationsEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(MigrationsEnum::User->table(), function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('password');
            $table->rememberToken();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(MigrationsEnum::User->table());
    }
};
