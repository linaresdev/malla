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
        Schema::create('groups', function (Blueprint $table)
        {
            $table->id();

            $table->unsignedBigInteger("parent")->default(0);

            $table->string("slug", 100);
            $table->string("description", 100);

            $table->unsignedBigInteger("counter")->default(0);

            $table->char("actiavated", 1)->default(1);

            $table->timestamps();
        });

        Schema::create('groupables', function (Blueprint $table)
        {
            $table->id();

            $table->string("groupable_type", 255);
            $table->unsignedBigInteger("groupable_id");

            $table->unsignedBigInteger("group_id");
            $table->foreign("group_id")->references("id")->on("groups")->onDelete("cascade");

            $table->timestamps();
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void {
        Schema::dropIfExists('groupables');
        Schema::dropIfExists('groups');
    }
};
