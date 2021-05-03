<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('first_name');
            $table->string('middle_name')->nullable();
            $table->string('last_name');
            $table->string('dob')->nullable();
            $table->integer('cnic');
            $table->string('mother_name')->nullable();
            $table->text('address')->nullable();
            $table->text('security_question')->nullable();
            $table->text('answer')->nullable();
            $table->string('invite_code')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function($table) {
            $table->dropColumn('first_name');
            $table->dropColumn('middle_name');
            $table->dropColumn('last_name');
            $table->dropColumn('dob');
            $table->dropColumn('cnic');
            $table->dropColumn('mother_name');
            $table->dropColumn('address');
            $table->dropColumn('security_question');
            $table->dropColumn('answer');
            $table->dropColumn('invite_code');
        });
    }
}
