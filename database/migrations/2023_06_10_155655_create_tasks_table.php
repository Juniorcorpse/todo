<?php

use App\Models\{User, Category};
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
        Schema::create('tasks', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description');
            $table->dateTime('due_date');
            $table->foreignIdFor(User::class)->references('id')->on('users')->onDelete('CASCADE');
            $table->foreignIdFor(Category::class)->references('id')->on('categories')->onDelete('CASCADE');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->dropForeignIdFor(User::class);
            $table->dropForeignIdFor(Category::class);
        });

        Schema::dropIfExists('tasks');
    }
};
