<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGuildUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guild_user', function (Blueprint $table) {
            // $table->increments('id');
            // $table->timestamps();
            $table->unsignedInteger('user_id');
            $table->unsignedInteger('guild_id');
            $table->unsignedInteger('role_id');

            // $table->string('model_type');
            // $table->unsignedBigInteger($columnNames['model_morph_key']);
            // $table->index([$columnNames['model_morph_key'], 'model_type', ]);

            $table->foreign('user_id')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');

            $table->foreign('guild_id')
                ->references('id')
                ->on('guilds')
                ->onDelete('cascade');

            $table->foreign('role_id')
                ->references('id')
                ->on('roles')
                ->onDelete('cascade');

            $table->primary(['user_id', 'guild_id', 'role_id'],
                    'guild_user_role_primary');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('guild_user');
    }
}
