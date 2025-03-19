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
        Schema::create('content', function (Blueprint $table) {
            $table->id();
            $table->string('section_name');
            $table->mediumText('info');
        });

        Schema::create('form_section', function (Blueprint $table) {
            $table->id();
            $table->foreignId('content_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->mediumText('description')
                ->nullable();
        });

        Schema::create('question_category', function (Blueprint $table) {
            $table->id();
            $table->foreignId('form_section_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->mediumText('description')
                ->nullable();
        });

        Schema::create('question', function (Blueprint $table) {
            $table->id();
            $table->foreignId('question_category_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict');
            $table->foreignId('sub_category_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict')
                ->nullable();
            $table->string('text');
            $table->mediumText('description')
                ->nullable();
        });

        Schema::create('sub_category', function (Blueprint $table) {
            $table->id();
            $table->string('name');
        });

        Schema::create('receiver', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->boolean('is_default');
        });

        Schema::create('academy', function (Blueprint $table) {
            $table->string('name')->primary();
        });

        Schema::create('receiver_of_academy', function (Blueprint $table) {
            $table->foreignId('receiver_email')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict')
                ->primary();
            $table->foreignId('academy_name')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('restrict')
                ->primary();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('content');
        Schema::dropIfExists('form_section');
        Schema::dropIfExists('question_category');
        Schema::dropIfExists('question');
        Schema::dropIfExists('sub_category');
        Schema::dropIfExists('receiver');
        Schema::dropIfExists('academy');
        Schema::dropIfExists('receiver_of_academy');
    }
};
