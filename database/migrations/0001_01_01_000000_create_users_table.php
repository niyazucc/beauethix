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
        Schema::create('users', function (Blueprint $table) {
            $table->string('userid')->primary();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
            $table->string('fname');
            $table->string('lname');
            $table->string('address1');
            $table->string('address2');
            $table->string('city');
            $table->string('state');
            $table->integer('zip');
            $table->string('country');
            $table->string('phonenum');
            $table->string('category');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });

        DB::table('users')->insert([
            [
                'userid' => 'aina',
                'email' => 'customer1@example.com',
                'password' => Hash::make('aina'),
                'fname' => 'John',
                'lname' => 'Doe',
                'address1' => '123 Main St',
                'address2' => '',
                'city' => 'Cityville',
                'state' => 'State',
                'zip' => 12345,
                'country' => 'Country',
                'phonenum' => '123-456-7890',
                'category' => 'customer',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'userid' => 'niyaz',
                'email' => 'admin1@example.com',
                'password' => Hash::make('niyaz'),
                'fname' => 'Admin',
                'lname' => 'User',
                'address1' => '456 Admin Ave',
                'address2' => '',
                'city' => 'Admin City',
                'state' => 'Admin State',
                'zip' => 67890,
                'country' => 'Admin Country',
                'phonenum' => '987-654-3210',
                'category' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};