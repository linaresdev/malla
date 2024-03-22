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
            $table->bigIncrements("id");

            $table->bigInteger("parent")->default(0);

            $table->string("type", 80)->default("group");
            $table->string("slug", 80);
            $table->string("name", 255);
            $table->bigInteger("counter")->default(0);

            $table->timestamps();
        });
        Schema::create('configs', function (Blueprint $table)
        {
            $table->bigIncrements("id");

            $table->string("configable_type", 255);
            $table->unsignedBigInteger("configable_id");

            $table->string("key", 100);
            $table->string("value");

            $table->boolean("activated")->default(1);
           
        });

        Schema::create('metas', function (Blueprint $table)
        {
            $table->bigIncrements("id");

            $table->string("metable_type", 255);
            $table->unsignedBigInteger("metable_id");

            $table->string("type", 30)->default("meta");

            $table->string("key", 30)->nullable();
            $table->text("value");
        });

        Schema::create('address', function (Blueprint $table)
        {
            $table->bigIncrements("id");

            $table->string("addressable_type", 255);
            $table->unsignedBigInteger("addressable_id");

            $table->string("phone",20)->nullable();
            $table->string("homephone",20)->nullable();
            $table->string("workphone",20)->nullable();
            $table->string("street",45)->nullable();
            $table->integer("number")->default(0);
            $table->string("district", 50)->nullable();
            $table->string("city", 45)->nullable();
            $table->string("latitude",15)->nullable();
            $table->string("longitude",15)->nullable();
            $table->string("location",30)->nullable();

            $table->timestamps();
        });

        Schema::create('taxonomies', function (Blueprint $table)
        {
            $table->id();

            $table->unsignedBigInteger("taxonomies_id");
            $table->string("taxonomies_type", 255);
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
        Schema::dropIfExists('address');
        Schema::dropIfExists('configs');
        Schema::dropIfExists('metas');
        Schema::dropIfExists('terms');
    }
};
