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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->text('bio', 1000)->nullable();
            $table->string('country');
            $table->string('gender');
            $table->string('profile_image_url')->default('https://res.cloudinary.com/dkkvbt5jl/image/upload/v1694503179/vzorevtyjmsvhsgvpwky.png');
            $table->string('region', 30);
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('profiles');
    }
};
