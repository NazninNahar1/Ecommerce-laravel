<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;


return new class extends Migration
{

    public function up(): void
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            //mandatory
            $table->string('emp_nr');
            $table->string('emp_name');
            $table->string('emp_user_name');
            $table->string('emp_company');
            $table->foreignId('department_id')->constrained()->cascadeOnDelete();
            //optional
            $table->string('password');
            $table->string('email')->unique();
            $table->string('comment')->nullable();
            $table->double('weekly_hours')->nullable();

            $table->string('contraction')->nullable();
            $table->string('nfc_chip_number')->nullable();
            $table->boolean('is_active')->default(false);
            $table->boolean('is_leanVisu')->default(false);
            $table->boolean('is_supervisor_flag')->default(false);

            $table->date('entry')->nullable();
            $table->date('exit')->nullable();
            $table->date('date_of_birth')->nullable();

            $table->string('supervisor_name')->nullable();
            $table->string('ages')->nullable();
            $table->string('emp_art')->nullable();
            $table->string('area')->nullable();
            $table->string('department_ma')->nullable();

            $table->string('hall_nr')->nullable();
            $table->string('assigned_role')->nullable();
            $table->string('machine_group')->nullable();
            $table->string('gender')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
