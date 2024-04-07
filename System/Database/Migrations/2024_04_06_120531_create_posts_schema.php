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
        Schema::create('categories', function (Blueprint $table)
        {
            $table->id();

            $table->string("slug", 100);
            $table->string("name", 70);

            $table->boolean("activated")->default(1);
            
        });
        Schema::create('posts', function (Blueprint $table)
        {
            $table->bigIncrements("id");

            $table->unsignedBigInteger("author")->nullable();
            //$table->foreign('author')->references('id')->on('users')->onDelete('set null');

            $table->unsignedBigInteger("category_id");
            //$table->foreign("category_id")->references("id")->on("categories")->onDelete('set null');

            $table->string("postable_type", 255);
            $table->unsignedBigInteger("postable_id");

            $table->string("password", 75)->nullable();

            $table->string("type", 30)->default("post");
            $table->string("guid", 255)->nullable();            
            $table->text("exceptions");
            $table->string("status", 20);

            $table->string("title", 100);
            $table->string("extract", 255)->nullable();
            $table->longText("body");

            $table->boolean("comment_status")->default(1);
            $table->integer("comment_count")->default(0);

            $table->char("activated", 1)->defaut(0);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('caregories');
        Schema::dropIfExists('posts');
    }
};
