<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * 
     * Create Model:
     * php artisan make:migration create_twitter_clone_table
     * and this will automatically takes the table name as 'twitter_clone'
     * 
     * Tables for twitter like clown application
     * 
     * table name: twitter_clone
     * id INT UNSIGNED AUTO_INCREMENT <UNSIGNED - no negative values allowed>
     * content VARCHAR(255) NOT NULL
     * likes INT UNSIGNED NOT NULL DEFAULT(0)
     * created_at TIMESTAMP NULL
     * updated_at TIMESTAMP NULL
     * 
     */
    public function up(): void
    {
        Schema::create('twitter_clone', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned()->index()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')->constrained()->cascadeOnDelete();
            $table->string('content')->nullable(false);
            $table->unsignedInteger('likes')->nullable(false)->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('twitter_clone');
    }
};
