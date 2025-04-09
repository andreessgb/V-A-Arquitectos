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
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->string('location');
            $table->integer('square_meters')->nullable(); // metros cuadrados
            $table->string('type'); // ejemplo: residential, commercial, etc.
            $table->string('status'); // en diseño, en construcción, finalizado...
            $table->decimal('budget', 12, 2)->nullable(); // presupuesto
            $table->string('main_image')->nullable();
            $table->date('start_date');
            $table->date('end_date')->nullable();
            
            // Clave foránea hacia users (el cliente)
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
        
            $table->timestamps();
        });
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('projects');
    }
};
