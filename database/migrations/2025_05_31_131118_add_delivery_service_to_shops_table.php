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
        Schema::table('shops', function (Blueprint $table) {
            $table->boolean('has_delivery')->default(false)->after('operating_hours');
            $table->string('grab_link')->nullable()->after('has_delivery');
            $table->string('gojek_link')->nullable()->after('grab_link');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('shops', function (Blueprint $table) {
            $table->dropColumn(['has_delivery', 'grab_link', 'gojek_link']);
        });
    }
};