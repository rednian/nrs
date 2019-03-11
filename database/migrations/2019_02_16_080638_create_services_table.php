<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateServicesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('services', function (Blueprint $table) {
            $table->increments('service_id');
            $table->integer('customer_id');
            $table->string('brand');
            $table->string('model');
            $table->string('serial');
            $table->tinyInteger('laptop_broken_lcd')->default(0);
            $table->tinyInteger('laptop_display_flickering')->default(0);
            $table->tinyInteger('laptop_casing_broken')->default(0);
            $table->tinyInteger('laptop_loose_hinges')->default(0);
            $table->tinyInteger('laptop_missing_keys')->default(0);
            $table->tinyInteger('laptop_broken_sockets')->default(0);
            $table->tinyInteger('laptop_hdd_defective')->default(0);
            $table->tinyInteger('laptop_optical_drive_damage')->default(0);
            $table->tinyInteger('printer_toner_spill')->default(0);
            $table->tinyInteger('printer_fuser_sleeve')->default(0);
            $table->tinyInteger('printer_ink_leakage')->default(0);
            $table->tinyInteger('printer_casing_broken')->default(0);
            $table->tinyInteger('lcd_scratches')->default(0);
            $table->tinyInteger('lcd_display_flickering')->default(0);
            $table->tinyInteger('lcd_casing_broken')->default(0);
            $table->tinyInteger('accessories_power_cord')->default(0);
            $table->tinyInteger('accessories_battery')->default(0);
            $table->tinyInteger('accessories_pcmcia')->default(0);
            $table->tinyInteger('accessories_optical_drive')->default(0);
            $table->tinyInteger('accessories_toner_cartridge')->default(0);
            $table->tinyInteger('accessories_ink_cartridge')->default(0);
            $table->tinyInteger('accessories_data_cable')->default(0);
            $table->tinyInteger('recovery_hdd')->default(0);
            $table->tinyInteger('recovery_laptop')->default(0);
            $table->tinyInteger('recovery_scsi')->default(0);
            $table->tinyInteger('recovery_sata')->default(0);
            $table->tinyInteger('recovery_sas')->default(0);
            $table->tinyInteger('recovery_nas')->default(0);
            $table->tinyInteger('recovery_ssd')->default(0);
            $table->tinyInteger('recovery_flash')->default(0);
            $table->tinyInteger('recovery_mobile')->default(0);
            $table->tinyInteger('revovery_tablet')->default(0);
            $table->text('problem_reported');
            $table->text('remarks');
//            $table->datetime('service_date')->nullable();
            $table->string('delivery')->nullable();
            $table->string('delivery_date')->nullable();
            $table->text('delivery_address')->nullable();
            $table->text('receipt_no');
            $table->string('service_status')->default('pending');
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
        Schema::dropIfExists('services');
    }
}
