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

        Schema::create('taxonomies', function (Blueprint $table)
        {
            $table->bigIncrements("id");

            $table->bigInteger("parent")->default(0);
            
            $table->string("tax", 45);
            $table->text("description");

            $table->bigInteger("counter")->default(0);

            $table->timestamps();
        });

        Schema::create('terms', function (Blueprint $table)
        {
            $table->bigIncrements("id");

            $table->unsignedBigInteger("tax_id");
            $table->foreign('tax_id')->references('id')->on('taxonomies')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->string("slug", 80);

            $table->string("name", 255);
        });

        Schema::create('posts_taxonomies_pivots', function (Blueprint $table) 
        {
            $table->bigIncrements('id');

            $table->unsignedBigInteger('post_id');
            $table->foreign('post_id')->references('id')->on('posts')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->unsignedBigInteger('tax_id');
            $table->foreign('tax_id')->references('id')->on('taxonomies')->onDelete('CASCADE')->onUpdate('CASCADE');

            $table->engine = 'InnoDB';
        });        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts_taxonomies_pivots');
        Schema::dropIfExists('terms');
        Schema::dropIfExists('taxonomies');
        Schema::dropIfExists('posts');
    }
};
