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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
			$table->string('username')->unique();
			$table->string('password');
            $table->string('email')->unique();
			$table->boolean('is_active')->default(true);
			$table->boolean('verified')->default(false);
            $table->timestamp('verified_at')->nullable();
			$table->rememberToken();
			$table->string('api_token', 80)->unique()->nullable()->default(null);
            $table->timestamps();
			$table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
};
