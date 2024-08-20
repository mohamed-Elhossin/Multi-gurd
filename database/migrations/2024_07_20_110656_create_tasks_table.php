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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string("description");
            $table->string("file")->nullable();
            $table->string("file_type")->nullable();
            $table->enum('status', ['pending', 'processing', 'completed', 'cancelled', 'pugs', 'logic_error'])->default('pending');
            $table->bigInteger("create_by")->unsigned();
            // Create By Who
            $table->foreign('create_by')->references('id')->on("users");
            // Asign To
            $table->foreignId("user_id")->references('id')->on("users");
            $table->foreignId("project_id")->references('id')->on("projects")->onDelete('cascade')->onUpdate("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tasks');
    }
};
