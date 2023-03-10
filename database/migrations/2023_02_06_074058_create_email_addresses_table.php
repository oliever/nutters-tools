<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailAddressesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_addresses', function (Blueprint $table) {
            $table->id();
            $table->integer('store_id');
            $table->string('email_address')->unique();
            $table->string('fb_id')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('cell_no')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();            
            $table->boolean('web_subs');
            $table->string('verification_key')->nullable();
            $table->timestamp('verified_at')->nullable();
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
        Schema::dropIfExists('email_addresses');
    }
}
