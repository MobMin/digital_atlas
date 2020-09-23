<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMobileSubscriptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mobile_subscriptions', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('total');
            $table->smallInteger('year_reported');
            $table->timestamp('created_at')->useCurrent();
        });
        Schema::table('mobile_subscriptions', function (Blueprint $table) {
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
        Schema::dropIfExists('mobile_subscriptions');
    }
}
