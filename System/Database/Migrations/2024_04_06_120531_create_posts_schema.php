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
        Schema::create('posts', function (Blueprint $table)
        {
            $table->bigIncrements("id");

            $table->unsignedBigInteger("user_id")->nullable();            
            $table->foreign('user_id')->references('id')->on('users')->nullOnDelete();
           
            //$table->unsignedBigInteger("category_id");
            //$table->foreign('category_id')->references('id')->on('taxonomies')->nullOnDelete();
            
            //$table->foreign("category_id")->references("id")->on("categories")->onDelete('set null');
            $table->string("password", 75)->nullable();

            $table->string("type", 30)->default("post");
            $table->string("guid", 255)->nullable();

            $table->text("exceptions")->nullable();
            $table->string("status", 20)->default("edition");

            $table->string("name", 200)->nullable();

            $table->string("title", 100);
            $table->string("slug", 100);
            $table->string("extract", 255)->nullable();
            $table->longText("body");

            $table->boolean("comment_status")->default(1);
            $table->integer("comment_count")->default(0);

            $table->char("activated", 1)->defaut(1);

            $table->timestamps();
        });

        Schema::create('comments', function (Blueprint $table)
        {
            $table->bigIncrements("id");

            $table->unsignedBigInteger("parent")->default(0);

            $table->string("commentable_type", 255);
            $table->unsignedBigInteger("commentable_id");

            $table->string("author", 120)->nullable();
            $table->string("author_email", 120)->nullable();

            $table->text("body");

            $table->integer('comment_count')->default(0);

            $table->boolean("activated")->default(1);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
        Schema::dropIfExists('comments');
    }
};
