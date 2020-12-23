<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRuleableRulesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ruleable__rules', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');

            $table->string('name');

            $table->longText('values')->nullable();

            $table->string('type');

            $table->tinyInteger('status')->default(0);
            // Your fields
            $table->timestamps();
        });

        Schema::create('ruleable__ruleable', function (Blueprint $table) {
          $table->increments('id');
          $table->string('ruleable_type');
          $table->integer('ruleable_id')->unsigned();
          $table->integer('rule_id')->unsigned();
          $table->index(['ruleable_type', 'ruleable_id'], 'ruleable_type_id_foreign');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      Schema::dropIfExists('ruleable__ruleable');
      Schema::dropIfExists('ruleable__rules');
    }
}
