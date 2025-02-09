<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration {
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('profile_lang')->default('de')->after('last_name');
              $table->json('custom_fields')->nullable()->after('profile_lang'); 
        });
        DB::statement("ALTER TABLE users ADD CONSTRAINT profile_lang_check CHECK (profile_lang IN ('de', 'en'))");
    }

    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn(['profile_lang', 'custom_fields']);
        });
    }
};
