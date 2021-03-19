<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaceContactTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('place_contact', function (Blueprint $table) {
            $table->id();
            $table->foreignId("place_id")->constrained("places", "id");
            $table->foreignId('user_id')->nullable()->constrained('users', 'id');
            $table->text("type");
            $table->text("contact");
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
        Schema::dropIfExists('place_contact');
    }
}
