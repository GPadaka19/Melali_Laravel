<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id('id_booking'); // Primary key
            $table->foreignId('id_user')->constrained('users')->onDelete('cascade'); // Foreign key to users table
            $table->string('full_name');
            $table->string('email');
            $table->string('no_hp'); // Phone number
            $table->foreignId('id_destination')->constrained('destinations')->onDelete('cascade'); // Foreign key to destinations table
            $table->integer('quantity');
            $table->string('payment_method');
            $table->decimal('total_price', 10, 2);
            $table->timestamps(); // Created_at and updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
