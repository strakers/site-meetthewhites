<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInviteGuestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invite_guests', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('invite_id')->unsigned();
            $table->foreign('invite_id')->references('id')->on('invites');
            $table->string('name');
            $table->boolean('is_named')->default(1);
            $table->boolean('is_attending')->default(0);
            $table->boolean('has_responded')->default(0);
            $table->timestamp('responded_at')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::dropIfExists('invite_guests');
    }
}
