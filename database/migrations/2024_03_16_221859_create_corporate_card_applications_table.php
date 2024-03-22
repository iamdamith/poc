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
        Schema::create('corporate_card_applications', function (Blueprint $table) {
            $table->id();
            $table->text('applicant_name')->nullable();
            $table->string('position')->nullable();
            $table->string('phone_work')->nullable();
            $table->string('phone_work_mobile')->nullable();
            $table->integer('manager_id')->nullable();
            $table->integer('property_n_procurement_manager_id')->nullable();
            $table->string('justification')->nullable();
            $table->string('licence')->nullable();
            $table->integer('created_by')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('corporate_card_applications');
    }
};
