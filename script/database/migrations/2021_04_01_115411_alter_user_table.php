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
            $table->dropColumn('name');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('dob');
            $table->integer('cnic');
            $table->string('mother_name');
            $table->text('address');
            $table->text('security_question');
            $table->text('answer');
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
            $table->string('name');
            $table->dropColumn('first_name');
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
