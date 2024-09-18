<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('meters', function (Blueprint $table) {
            $table->id();
            $table->string('doc_number');
            $table->string('state_register');
            $table->string('meter_number');
            $table->string('modification');
            $table->float('temperature');
            $table->date('date_contract');
            $table->date('date_expire');

            $table->bigInteger('order_id')->unsigned();
            $table->foreign('order_id')
                ->references('id')
                ->on('orders')
                ->onDelete('cascade');

            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('meters');
    }
};
