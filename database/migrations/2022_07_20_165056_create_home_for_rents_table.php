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
        Schema::create('home_for_rents', function (Blueprint $table) {
            $table->id();
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->string('condition');
            $table->integer('value');
            $table->integer('area');
            $table->integer('bed');
            $table->integer('bath');
            $table->integer('parking');
            $table->string('cep');
            $table->fullText('description');
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate()->cascadeOnDelete();
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
        Schema::dropIfExists('home_for_rents');
    }
};
