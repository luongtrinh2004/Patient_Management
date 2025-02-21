<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
{
    Schema::create('medical_records', function (Blueprint $table) {
        $table->id();
        $table->date('exam_date'); // Ngày khám
        $table->text('diagnosis'); // Chẩn đoán
        $table->text('prescription')->nullable(); // Toa thuốc
        $table->text('notes')->nullable(); // Ghi chú thêm

        $table->foreignId('doctor_id')->constrained('doctors')->onDelete('cascade'); 
        $table->foreignId('patient_id')->constrained('patients')->onDelete('cascade');

        $table->index('doctor_id');
        $table->index('patient_id');
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_records');
    }
}
