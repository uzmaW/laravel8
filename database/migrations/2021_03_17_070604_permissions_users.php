<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PermissionsUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
                // Create table for associating permissions to users (Many To Many Polymorphic)
                Schema::create('permissions_users', function (Blueprint $table) {
                    $table->unsignedBigInteger('permission_id');
                    $table->unsignedBigInteger('user_id');
        
                    $table->foreign('permission_id')->references('id')->on('permissions')
                        ->onUpdate('cascade')->onDelete('cascade');
        
                    $table->primary(['user_id', 'permission_id']);
                });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permissions_users');
    }
}
