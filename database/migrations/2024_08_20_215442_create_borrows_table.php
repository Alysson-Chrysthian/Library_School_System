<?php

use App\Models\Book;
use App\Models\Librarian;
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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id();
            $table->date('return_date');
            $table->date('borrow_date');
            $table->boolean('late')->default(0);
            $table->foreignIdFor(Book::class);
            $table->foreignIdFor(Librarian::class);
            $table->string('student_registration');
            $table->foreign('student_registration')->references('registration')->on('students');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
