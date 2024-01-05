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
        Schema::create('agents', function (Blueprint $table) {
            $table->id();
            $table->string('agent_name');
            $table->string('agent_username')->nullable();
            $table->string('agent_email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('agent_facebookurl')->nullable();
            $table->string('agent_twitterurl')->nullable();
            $table->string('agent_instagramurl')->nullable();
            $table->string('agent_photo')->nullable();
            $table->string('agent_phone')->nullable();
            $table->string('agent_address')->nullable();
            $table->text('agent_description')->nullable();
            $table->enum('agent_status', ['active', 'inactive'])->nullable('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('agents');
    }
};
