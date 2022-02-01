<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RenameReleasedAtToPublishedAtInDogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
       
            Schema::table('dogs', function (Blueprint $table) {
                $table->renameColumn('released_at','published_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dogs', function (Blueprint $table) {
            $table->renameColumn('published_at','released_at');
        });
    }
}
