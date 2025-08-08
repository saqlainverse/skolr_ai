<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->string('hygen_link')->nullable()->after('title');
        });
    }

    public function down()
    {
        Schema::table('lessons', function (Blueprint $table) {
            $table->dropColumn('hygen_link');
        });
    }
};

