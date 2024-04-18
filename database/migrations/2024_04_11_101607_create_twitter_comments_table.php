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
        Schema::create('twitter_comments', function (Blueprint $table) {
            $table->id();

            $table->bigInteger('user_id')->unsigned()->index()->nullable(false);
            $table->foreign('user_id')->references('id')->on('users')->constrained()->cascadeOnDelete();

            // $table->foreignId('twitter_clone_id')->constrained()->cascadeOnDelete();
            $table->bigInteger('tweet_id')->unsigned()->index()->nullable(false);
            $table->foreign('tweet_id')->references('id')->on('twitter_clone')->constrained()->cascadeOnDelete();
            // constrained() - throws an error when we try to insert id of an non-existing primary key from the reference table.
            // cascadeOnDelete() - if reference tbl primary key is deleted this entry will also be deleted.
            $table->string('comment');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('twitter_comments');
    }
};
