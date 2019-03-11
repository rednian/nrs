<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('delivery_id');
            $table->integer('customer_id');
            $table->string('reference_no')->nullable();
            $table->datetime('delivery_date');
            $table->datetime('date_delivered')->nullable();
            $table->string('delivery_status')->default('pending');
            $table->string('delivery_notified')->nullable();
            $table->text('delivery_location');
            $table->string('delivered_notified')->nullable();
            $table->timestamps();
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
        Schema::dropIfExists('deliveries');
    }
}
