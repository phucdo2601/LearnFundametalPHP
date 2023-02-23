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
        Schema::create('posts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('body');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //php artisan migrate:reset
        //will call this function
        //php artisan migrate:refresh = delete all tables and migrates
        //php artisan migrate:fresh = do not call down
        //php artisan make:factory = create fake data
        Schema::dropIfExists('posts');
    }
};
