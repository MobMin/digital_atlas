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
            $table->decimal('percent_buddhist', 8, 3);
            $table->decimal('percent_christian', 8, 3);
            $table->decimal('percent_evangelical', 8, 3);
            $table->decimal('percent_hindu', 8, 3);
            $table->decimal('percent_islam', 8, 3);
            $table->decimal('percent_ethnic_religion', 8, 3);
            $table->decimal('percent_other_religion', 8, 3);
            $table->decimal('percent_non_religious', 8, 3);
            $table->string('rog3', 3);
            $table->timestamp('created_at')->useCurrent();
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
