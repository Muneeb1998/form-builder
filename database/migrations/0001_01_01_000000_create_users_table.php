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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Auto-increment primary key (not null)
            $table->string('first_name')->nullable(); // Nullable first name
            $table->string('last_name')->nullable(false); // Not null last name
            $table->string('email')->unique(); // Not null & unique email
            $table->string('password'); // Not null password
            $table->timestamp('created_at')->useCurrent(); // Not null created_at with default current timestamp
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
