<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedianAgeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('median_age', function (Blueprint $table) {
            $table->id();
            $table->decimal('total', 8, 3);
            $table->smallInteger('year_reported');
            $table->timestamp('created_at')->useCurrent();
        });
        Schema::table('median_age', function (Blueprint $table) {
    	    $table->foreignId('country_id')->constrained()->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('median_age');
    }
}
