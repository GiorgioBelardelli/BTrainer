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
        Schema::table('specialization_user', function (Blueprint $table) {

            $table -> foreignId('specialization_id') -> constrained();
            $table -> foreignId('user_id') -> constrained();
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->foreignId('user_id')->constrained();
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->foreignId('profile_id')->constrained();
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->foreignId('profile_id')->constrained();
        });

        Schema::table('sponsorships', function (Blueprint $table) {
            $table->foreignId('profile_id')->constrained();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('specialization_user', function (Blueprint $table) {

            $table->dropForeign(['specialization_id']);
            $table -> dropColumn(['specialization_id']);

            $table -> dropForeign(['user_id']);
            $table -> dropColumn(['user_id']);
        });

        Schema::table('profiles', function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropColumn(['user_id']);
        });

        Schema::table('messages', function (Blueprint $table) {
            $table->dropForeign(['profile_id']);
            $table->dropColumn(['profile_id']);
        });

        Schema::table('reviews', function (Blueprint $table) {
            $table->dropForeign(['profile_id']);
            $table->dropColumn(['profile_id']);
        });

        Schema::table('sponsorships', function (Blueprint $table) {
            $table->dropForeign(['profile_id']);
            $table->dropColumn(['profile_id']);
        });
    }
};
