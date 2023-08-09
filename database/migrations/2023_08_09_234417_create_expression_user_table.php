<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('expression_user', function (Blueprint $table) {
            $table->id();
            $table->foreignId('expression_id')->constrained('expressions');  
            $table->foreignId('user_id')->constrained('users');
            $table->timestamps();
            $table->unique(['expression_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('expression_user');
    }
};
