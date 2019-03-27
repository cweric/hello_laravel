<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblADCategoryLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblADCategoryLog', function(Blueprint $table)
        {
            $table->integer('systemAccount_ID')->unsigned()->default(0)->index('systemAccount_ID')->comment('維護人員序號');
            $table->string('scriptName')->nullable()->comment('程式名稱');
            $table->string('actions', 20)->nullable()->index('actions')->comment('執行動作');
            $table->char('sqlIndex', 1)->nullable()->index('sqlIndex')->comment('SQL指令代碼(建索引用，s: select, i: insert, u: update, d: delete)');
            $table->text('sqlData', 65535)->nullable()->comment('SQL語法');
            $table->string('comment')->nullable()->comment('備註');
            $table->string('userIP', 15)->nullable()->comment('使用者遠端位址');
            $table->dateTime('createDateTime')->comment('資料建立日期');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('tblADCategoryLog');
    }
}
