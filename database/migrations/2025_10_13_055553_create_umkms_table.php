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
        Schema::create('umkms', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('province_id')->constrained('indonesia_provinces');
            $table->foreignId('city_id')->constrained('indonesia_cities');
            $table->foreignId('district_id')->nullable()->constrained('indonesia_districts');
            $table->foreignId('village_id')->nullable()->constrained('indonesia_villages');
            $table->string('umkm_picture')->default('defaults/default_store.webp');
            $table->text('description');
            $table->enum('type', ['Tetap', 'Keliling']);
            $table->text('gmaps_link')->nullable();
            $table->decimal('latitude')->nullable();
            $table->decimal('longitude')->nullable();
            $table->text('address')->nullable();
            $table->char('phone_number', 15)->nullable();
            $table->string('open_days')->nullable(); //note: dropdown hardcode value
            $table->string('open_time')->nullable();
            $table->string('close_time')->nullable();
            $table->text('image')->nullable();
            $table->decimal('average_rating')->default(0);
            $table->boolean('is_open_for_collaboration')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('umkms');
    }
};
