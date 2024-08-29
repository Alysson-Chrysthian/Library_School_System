<?php

use App\Models\Book;
use App\Models\Student;
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
        Schema::create('reserves', function (Blueprint $table) {
            $table->id();
            $table->dateTime('reserve_date');
            $table->foreignIdFor(Book::class)
                ->constrained()
                ->cascadeOnDelete();
            $table->string('student_registration');
            $table->foreign('student_registration')
                ->references('registration')
                ->on('students')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reserves');
    }
};
