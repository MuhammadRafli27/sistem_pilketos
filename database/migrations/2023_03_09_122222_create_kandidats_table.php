<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kandidats', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kandidat');
            $table->string('kelas_kandidat');
            $table->string('foto_kandidat')->nullable();
            $table->text('visi_kandidat');
            $table->text('misi_kandidat');
            $table->integer('vote')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('kandidats');
        Schema::table('kandidats', function(Blueprint $table){
            $table->dropColumn('vote');
        });
    }
};
