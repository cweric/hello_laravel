<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblADCategoryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblADCategory', function(Blueprint $table)
        {
            $table->increments('ID')->comment('序號代碼 (自動流水號)');
            $table->integer('systemChannel_ID')->unsigned()->default(0)->comment('所屬廠商代碼');
            $table->string('zeroID', 10)->nullable()->index('zeroID')->comment('Zero Fill 序號代碼 (為避免更新失敗，刻意不設定為unique)');
            $table->string('IDPath', 10)->nullable()->index('IDPath')->comment('Zero Fill 父親序號代碼');
            $table->string('fullIDPath')->nullable()->comment('完整 Zero Fill 類別路徑 (包含自己，以逗號區隔每一層級，為避免更新失敗，刻意不設定為unique)');
            $table->string('name', 100)->nullable()->comment('類別名稱 (當類別層級相同且使用狀態不為x時，本欄位不可重覆)');
            $table->text('comment', 65535)->nullable()->comment('欄位輸入備註');
            $table->string('type', 2)->comment('版位類型');
            $table->boolean('number')->comment('廣告素材數量');
            $table->boolean('weight')->default(0)->comment('排序權重');
            $table->char('status', 1)->nullable()->index('status')->comment('使用狀態 (y:開放, n:關閉, x:刪除)');
            $table->integer('create_systemAccount_ID')->unsigned()->comment('建立人員序號');
            $table->integer('systemAccount_ID')->unsigned()->default(0)->comment('維護人員序號');
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
        Schema::drop('tblADCategory');
    }
}
