<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBroadbandSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('broadband_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total');
            $table->smallInteger('year_reported');
            $table->timestamp('created_at')->useCurrent();
        });
        Schema::table('broadband_subscriptions', function (Blueprint $table) {
            $table->foreignId('country_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('broadband_subscriptions');
    }
}
