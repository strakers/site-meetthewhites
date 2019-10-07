<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInviteSonglistsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invite_songlists', function (Blueprint $table) {
            $table->integer('invite_id')->unsigned();
            $table->foreign('invite_id')->references('id')->on('invites');
            $table->integer('songlist_id')->unsigned();
            $table->foreign('songlist_id')->references('id')->on('songlists');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->softDeletes();
            $table->primary(['invite_id','songlist_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('invite_songlists');
    }
}
