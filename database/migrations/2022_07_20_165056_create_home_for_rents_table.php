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
            $table->longText('description')->nullable();
            $table->string('photo')->nullable();
            $table->string('address')->nullable();
            $table->string('condition')->nullable();
            $table->string('type');
            $table->float('value');
            $table->integer('area');
            $table->integer('bed');
            $table->integer('bath');
            $table->integer('parking')->nullable();
            $table->string('cep');
            $table->boolean('active')->default(false);
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
