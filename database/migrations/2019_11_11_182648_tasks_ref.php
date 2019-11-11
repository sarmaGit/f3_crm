<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TasksRef extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        \DB::statement("alter table tasks modify vendor_code int unsigned not null");
        Schema::table('tasks', function (Blueprint $table) {
            $table->renameColumn('vendor_code','vendor_id');
            $table->dropColumn('vendor_name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tasks', function (Blueprint $table) {
            $table->renameColumn('vendor_id','vendor_code');
            $table->unsignedInteger('vendor_code')->nullable()->change();
            $table->string('vendor_name');
        });
    }
}
