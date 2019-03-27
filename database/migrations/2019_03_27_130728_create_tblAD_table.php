<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblADTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblAD', function(Blueprint $table)
        {
            $table->increments('ID')->comment('序號代碼 (自動流水號)');
            $table->integer('systemChannel_ID')->unsigned()->default(0)->comment('所屬廠商代碼');
            $table->string('adCategory_zeroID', 10)->nullable()->index('titleUrlCategory_zeroID')->comment('標題連結類別編號');
            $table->integer('customer_ID')->unsigned()->comment('客戶名稱代碼');
            $table->integer('event_ID')->unsigned()->comment('活動名稱代碼');
            $table->string('title')->nullable()->comment('主標題');
            $table->string('subtitle')->default('')->comment('副標題');
            $table->text('description', 65535)->comment('描述');
            $table->string('url')->nullable()->comment('連結網址');
            $table->char('target', 1)->nullable()->comment('連結方式 (n: 原來視窗, o: 跳出視窗)');
            $table->string('imgSrc_1')->nullable()->comment('圖片檔名');
            $table->string('imgAlt_1')->nullable()->comment('圖片替代文字 (ATL)');
            $table->string('imgSrc_2')->nullable()->comment('iPhone、iPad廣告顯示圖檔');
            $table->char('isRandom', 1)->nullable()->index('titleUrl_isRandom')->comment('輪替或固定素材 (y: 輪替, n: 固定)');
            $table->boolean('weight')->default(0)->comment('排序權重');
            $table->integer('timeout')->unsigned()->default(0)->comment('廣告點閱防灌水區間 (單位:分鐘)');
            $table->char('isImpress', 1)->nullable()->comment('曝光形式 (y: 有限次, n: 無限次)');
            $table->integer('impressQuota')->unsigned()->default(0)->comment('曝光次數');
            $table->boolean('impressWeight')->default(0)->comment('曝光權重');
            $table->integer('impression')->unsigned()->default(0)->comment('剩餘曝光次數');
            $table->integer('click')->unsigned()->default(0)->comment('總點閱數(即時更新)');
            $table->integer('totalClick')->unsigned()->default(0)->comment('總點閱數(排程用)');
            $table->integer('totalImpress')->unsigned()->default(0)->comment('總曝光數(排程用)');
            $table->char('isEnabled', 1)->default('n')->index('IX_ENABLED')->comment('是否啟用(y:是, n:否)');
            $table->char('status', 1)->nullable()->index('titleUrl_Status')->comment('使用狀態 (y:開放, n:關閉, x:刪除)');
            $table->integer('create_systemAccount_ID')->unsigned()->comment('建立人員序號');
            $table->integer('systemAccount_ID')->unsigned()->default(0)->comment('維護人員序號');
            $table->dateTime('startDateTime')->default('0000-00-00 00:00:00')->comment('上檔日期');
            $table->dateTime('endDateTime')->default('0000-00-00 00:00:00')->comment('下檔日期');
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
        Schema::drop('tblAD');
    }
}
