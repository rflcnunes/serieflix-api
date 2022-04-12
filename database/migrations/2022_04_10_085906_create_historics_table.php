<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historics', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('historic_series_code');
            $table->foreign('historic_series_code')
                ->references('series_code')
                ->on('series')
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('historic_series_name');
            $table->integer('historic_series_seasons');
            $table->integer('historic_series_episodes');
            $table->string('historic_series_updated');
            $table->dateTime('historic_series_updated_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('historics');
    }
};
