<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTblADAccessHourSummaryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tblADAccessHourSummary', function(Blueprint $table)
        {
            $table->increments('ID')->comment('自動流水號');
            $table->integer('ad_ID')->unsigned()->default(0)->index('titleUrl_ID')->comment('Title編號');
            $table->string('summaryHour', 2)->comment('小時');
            $table->date('summaryDate')->comment('摘要日期');
            $table->integer('impressNum')->unsigned()->default(0)->comment('曝光數');
            $table->integer('clickNum')->unsigned()->default(0)->comment('點閱數');
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
        Schema::drop('tblADAccessHourSummary');
    }
}
