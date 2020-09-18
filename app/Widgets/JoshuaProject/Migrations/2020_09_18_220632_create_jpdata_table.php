<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJpdataTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jpdata', function (Blueprint $table) {
            $table->id();
            $table->string('primary_religion', 255);
            $table->integer('total_people_groups');
            $table->integer('total_unreached');
            $table->integer('jp_scale');
            $table->boolean('in_1040')->default(false);
            $table->decimal('percent_buddhist');
            $table->decimal('percent_christian');
            $table->decimal('percent_evangelical');
            $table->decimal('percent_hindu');
            $table->decimal('percent_islam');
            $table->decimal('percent_ethnic_religion');
            $table->decimal('percent_other_religion');
            $table->timestamps();
        });
        Schema::table('jpdata', function (Blueprint $table) {
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
        Schema::dropIfExists('jpdata');
    }
}
