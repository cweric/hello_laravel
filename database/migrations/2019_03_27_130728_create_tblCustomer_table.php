<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblCustomerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblCustomer', function(Blueprint $table)
        {
            $table->integer('ID', true)->comment('序號代碼');
            $table->integer('systemChannel_ID')->unsigned()->default(0)->comment('所屬廠商代碼');
            $table->string('name', 50)->comment('客戶名稱');
            $table->char('status', 1)->nullable()->comment('使用狀態');
            $table->integer('create_systemAccount_ID')->default(0)->comment('建立人員序號');
            $table->integer('systemAccount_ID')->default(0)->comment('維護人員序號');
            $table->dateTime('createDateTime')->default('0000-00-00 00:00:00')->comment('資料建立日期');
            $table->dateTime('updateDateTime')->default('0000-00-00 00:00:00')->comment('資料更新日期');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblCustomer');
    }
}
