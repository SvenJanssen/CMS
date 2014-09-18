<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class UserTenantTest3 extends Migration
{
    /**
     * Run the migrations.
     *
     * @param  string|int                           $id
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function up($id, Model $model)
    {
        Schema::table("user_{$id}_", function (Blueprint $table) {

        });
    }

    /**
     * Reverse the migrations.
     *
     * @param  string|int                           $id
     * @param  \Illuminate\Database\Eloquent\Model  $model
     * @return void
     */
    public function down($id, Model $model)
    {
        Schema::table("user_{$id}_", function (Blueprint $table) {

        });
    }
}
