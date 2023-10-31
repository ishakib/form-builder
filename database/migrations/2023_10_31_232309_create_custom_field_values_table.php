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
        Schema::create('custom_field_values', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('custom_field_type_id');
            $table->unsignedBigInteger('created_by');
            $table->string('name');
            $table->string('context');
            $table->text('meta')->nullable();
            $table->boolean('in_list')->default(0);
            $table->boolean('is_for_admin')->default(0);
            $table->timestamps();

            $table->foreign('custom_field_type_id')
                ->references('id')
                ->on('custom_field_types');

            $table->foreign('created_by')
                ->references('id')
                ->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('custom_field_values');
    }
};
