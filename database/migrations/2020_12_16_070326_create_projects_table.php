<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProjectsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('projects', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('owner_id')->unsigned()->index();
            $table->string('title');
            $table->text('description');
            $table->timestamps();

            /**
             * @DOC
             * Have the foreign key on the projects table set to owner_id
             * and have it reference the id column in the users table.
             * When a user is deleted delete all of their projects as well.
             */
            $table->foreign('owner_id')->references('id')->on('users')->onDelete('cascade');
        });
        Schema::enableForeignKeyConstraints();

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::disableForeignKeyConstraints();
        Schema::dropIfExists('projects');
        Schema::enableForeignKeyConstraints();

    }
}
