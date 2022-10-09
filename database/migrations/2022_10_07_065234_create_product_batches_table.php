<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('product_batches', function (Blueprint $table) {
            $table->id();
            $table->string('serial');
            $table->date('manufacturing_date')->nullable();
            $table->date('expiry_date')->nullable();
            $table->float('cost')->default(0);
            $table->float('price')->default(0);
            $table->bigInteger('product_id');
            $table->bigInteger('principal_id');
            $table->bigInteger('distribution_id');
            $table->softDeletes();
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
        Schema::dropIfExists('product_batches');
    }
};
