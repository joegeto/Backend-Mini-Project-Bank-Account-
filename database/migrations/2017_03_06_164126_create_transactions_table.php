<?php

use App\Contracts\TransactionContract;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('account_id', false, true);
//            $table->foreign('account_id')->references('id')->on('accounts')->onDelete('cascade');
            $table->float('amount');
            $table->enum('type', [TransactionContract::TRANSACTION_DEPOSIT, TransactionContract::TRANSACTION_WITHDRAWAL]);
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
//        Schema::table('transactions', function (Blueprint $table){
//            $table->dropForeign('transactions_account_id_foreign');
//        });
        Schema::dropIfExists('transactions');
    }
}
