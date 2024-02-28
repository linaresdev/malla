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
        Schema::create('apps', function (Blueprint $table)
        {
            $table->id();

            $table->string("type", 50)->default("package");

            $table->unsignedInteger("parent")->default(0);

            $table->string("slug", 30);

            $table->string("driver", 250)->nullable();

            $table->string("serial", 200)->nullable();

            $table->char("activated", 1)->default(1);

            $table->timestamps();
        });

        Schema::create('metas', function (Blueprint $table)
        {
            $table->bigIncrements('id');

            $table->text("meta");

            $table->unsigneBigInteger("metatable_id");
            $table->text("metatable_type");

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apps_meta');
        Schema::dropIfExists('apps');
    }
};
