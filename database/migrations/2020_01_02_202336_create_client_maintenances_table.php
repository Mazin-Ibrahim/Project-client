<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateClientMaintenancesTable extends Migration
{ 
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('client_maintenances', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('date');
            $table->integer('client_id')->nullable();
            $table->text('status')->nullable();
            $table->string('code')->nullable();;
            $table->integer('maintenance_id')->nullable();;
            $table->text('note')->nullable();
            $table->float('amm')->nullable();
            $table->integer('done')->nullable();
            $table->float('end_cost')->nullable();
            $table->float('disc_amm')->nullable();
            $table->integer('tecnical_id')->nullable();
            $table->integer('is_deleted')->default(0);
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
        Schema::dropIfExists('client_maintenances');
    }
}
