<?php

use IlluminateDatabaseMigrationsMigration;

class CreateUsersTable extends Migration {

    public function up()
    {
        Schema::create('user', function($table)
        {
            $table->increments('id');
            $table->string('email')->unique();
            $table->string('photo');
            $table->string('name');
            $table->string('password');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::drop('user');
    }

}