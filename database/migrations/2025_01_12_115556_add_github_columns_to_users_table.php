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
        Schema::table('users', function (Blueprint $table) {
            // Adds a new column to the 'users' table to store the GitHub user's unique ID.
            // This will be used to associate the Laravel user with their GitHub account.
            // The column is nullable because not all users may use GitHub to log in.
            $table->string('github_id')->nullable();

            // Adds a new column to the 'users' table to store the GitHub access token.
            // This token is needed to make API requests to GitHub on behalf of the user.
            // It is nullable because not all users will have GitHub tokens.
            $table->string('github_token')->nullable();

            // Adds a new column to the 'users' table to store the URL of the user's GitHub avatar (profile picture).
            // This allows displaying the GitHub profile picture within the application.
            // The column is nullable because users who don't log in via GitHub won't have an avatar URL.
            $table->string('avatar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
