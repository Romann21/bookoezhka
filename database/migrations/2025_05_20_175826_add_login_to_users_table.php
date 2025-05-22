<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  // database/migrations/xxxx_add_login_to_users_table.php
public function up()
{
    Schema::table('users', function (Blueprint $table) {
        $table->string('login')->unique()->after('id');
    });
}

public function down()
{
    Schema::table('users', function (Blueprint $table) {
        $table->dropColumn('login');
    });
}
};
