<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomDiTabelUser extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() //MENAMBAHKAN KOLOM PADA TABLE USERS SETELAH ID 
    {
        Schema::table('users', function (Blueprint $table){
            $table->string('username', 20)->after('id')->nullable()->unique();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table){
            $table->dropColumn('username');
        });
    }
}