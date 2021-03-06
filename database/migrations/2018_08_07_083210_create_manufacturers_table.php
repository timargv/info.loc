<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateManufacturersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('manufacturers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->string('number')->nullable();
            $table->string('email')->nullable();
            $table->string('site_link')->nullable();
            $table->string('code_product')->nullable();
            $table->string('address')->nullable();
            $table->text('comment')->nullable();
            $table->timestamps();
        });

        \Illuminate\Support\Facades\DB::statement('ALTER TABLE manufacturers ADD FULLTEXT search(title, code_product, email, number)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('manufacturers');
    }
}
