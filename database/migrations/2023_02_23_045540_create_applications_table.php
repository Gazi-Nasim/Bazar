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
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('upazilla_id');
            $table->foreign('upazilla_id')->references('id')->on('upazillas')->onDelete('cascade')->onUpdate('cascade');
            $table->unsignedBigInteger('bazar_id');
            $table->foreign('bazar_id')->references('id')->on('bazars')->onDelete('cascade')->onUpdate('cascade');
            $table->string('plot_no');
            $table->enum('plot_type',['বানিজ্যিক','আবাসিক'])->default('বানিজ্যিক');
            $table->string('plot_area');
            $table->string('rights');
            $table->string('time');
            $table->string('north');
            $table->string('south');
            $table->string('east');
            $table->string('west');
            $table->enum('application_type',['বন্দোবস্তী','পূণঃ বন্দোবস্তী','ইজারা'])->default('বন্দোবস্তী');
            $table->string('name');
            $table->string('mobile');
            $table->string('father_or_husband');
            $table->string('shang');
            $table->string('post');
            $table->string('nid_no');
            $table->string('photo');
            $table->string('nid_photo');
            $table->string('record_papers');
            $table->unsignedBigInteger('serveyor_id')->nullable();
            $table->longText('survey_report')->nullable();
            $table->date('report_date')->nullable();
            $table->enum('status',['pending','approved','survey','survey_completed','payment','final'])->default('pending');
            $table->text('remarks')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
