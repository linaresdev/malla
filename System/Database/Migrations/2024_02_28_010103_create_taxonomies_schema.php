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
        Schema::create('terms', function (Blueprint $table)
        {
            $table->id();

            $table->string("name", 200);
            $table->timestamps();
        });

        Schema::create('taxonomies', function (Blueprint $table)
        {
            $table->id();

            $table->unsignedBigInteger("taxonomy_id");
            $table->string("taxonomy_type", 255);
            $table->unsignedBigInteger("term_id");
            $table->foreign("term_id")->references("id")->on("terms")->onDelete("cascade");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('taxonomies');
    }
};
