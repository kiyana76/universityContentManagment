<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGlobalFieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('global_fields', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum('status', array('enable', 'disable'));
            $table->unsignedBigInteger('group_id');
            $table->foreign('group_id')->references('id')->on('global_groups')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('global_fields');
    }
}
