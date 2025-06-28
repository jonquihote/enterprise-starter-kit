<?php

use Enterprise\Base\Enums\MigrationsEnum;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create(MigrationsEnum::UserCredential->table(), function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->foreignId('user_id')
                ->constrained(MigrationsEnum::User->table())
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->string('type');
            $table->string('value')->unique();
            $table->timestamp('verified_at')->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists(MigrationsEnum::UserCredential->table());
    }
};
