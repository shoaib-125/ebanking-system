<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWithDrawRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('with_draw_requests', function (Blueprint $table) {
            $table->id();
            //$table->unsignedInteger('transaction_id')->index();
            $table->integer('transaction_id')->unsigned()->nullable();
            //$table->foreign('transaction_id')->references('id')->on('transactions')->onDelete('cascade');

            $table->string('account_title');
            $table->integer('account_no');
            $table->string('withdraw_method');
         /*   $table->foreign('transaction_id')->references('id')
                    ->on('transactions')
                    ->onDelete('cascade');*/

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
        Schema::dropIfExists('with_draw_requests');
    }
}
