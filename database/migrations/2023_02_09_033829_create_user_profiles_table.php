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
        Schema::create('user_profiles', function (Blueprint $table) {
            $table->id();
			$table->foreignId('user_id')->constrained('users')->onDelete('cascade');
			$table->foreignId('prefix_id')->constrained('prefixes')->nullable()->default(null)->onDelete('restrict');
			$table->string('first_name');
			$table->string('last_name');
			$table->foreignId('gender_id')->constrained('genders')->nullable()->default(null)->onDelete('restrict');
			$table->date('birthday')->nullable()->default(null);
			$table->string('phone')->nullable()->default(null);
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
        Schema::dropIfExists('user_profiles');
    }
};
