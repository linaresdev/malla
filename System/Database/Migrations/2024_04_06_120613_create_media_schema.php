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
        Schema::create('medias', function (Blueprint $table) {
           
            $table->bigIncrements("id");

            $table->string("mediatable_type", 255);
            $table->unsignedBigInteger("mediable_id");

            $table->string("type", 20);

            $table->string("name", 100);

            $table->string("description", 255);
            $table->string("mime", 10)->nullable();

            $table->text("url");

            $table->char("actiavated", 1)->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('medias');
    }
};