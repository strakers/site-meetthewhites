<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInviteGuestMetafieldsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invite_guest_metafields', function (Blueprint $table) {
            $table->integer('invite_guest_id')->unsigned();
            $table->foreign('invite_guest_id')->references('id')->on('invite_guests');
            $table->integer('metafield_id')->unsigned();
            $table->foreign('metafield_id')->references('id')->on('metafields');
            $table->string('meta_value',255)->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->primary(['invite_guest_id','metafield_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invite_guest_metafields');
    }
}
