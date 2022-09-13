<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TrendingOnTwitter extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trending_on_twitter', function (Blueprint $table) {
            $table->id();
            $table->string('tweet_name', 255);
            $table->bigInteger('tweet_count');
            $table->timestamp('created_at')->useCurrent();
        });
        Schema::table('trending_on_twitter', function (Blueprint $table) {
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
        Schema::dropIfExists('trending_on_twitter');
    }
}
