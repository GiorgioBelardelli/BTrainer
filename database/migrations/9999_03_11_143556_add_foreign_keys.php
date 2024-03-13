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
        Schema::table('profile_specialization', function (Blueprint $table) {

            $table -> foreignId('profile_id') -> constrained();
            $table -> foreignId('specialization_id') -> constrained();
        });

        Schema::table('profile_vote', function (Blueprint $table) {

            $table -> foreignId('profile_id') -> constrained();
            $table -> foreignId('vote_id') -> constrained();
        });

        Schema::table('profile_sponsorship', function (Blueprint $table) {

            $table -> foreignId('profile_id') -> constrained() ->nullable();
            $table -> foreignId('sponsorship_id') -> constrained() ->nullable();
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
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('profile_specialization', function (Blueprint $table) {

            $table->dropForeign(['specialization_id']);
            $table -> dropColumn(['specialization_id']);

            $table -> dropForeign(['profile_id']);
            $table -> dropColumn(['profile_id']);
        });

        Schema::table('profile_sponsorship', function (Blueprint $table) {

            $table->dropForeign(['sponsorship_id']);
            $table -> dropColumn(['sponsorship_id']);

            $table -> dropForeign(['profile_id']);
            $table -> dropColumn(['profile_id']);
        });

        Schema::table('profile_vote', function (Blueprint $table) {

            $table->dropForeign(['vote_id']);
            $table -> dropColumn(['vote_id']);

            $table -> dropForeign(['profile_id']);
            $table -> dropColumn(['profile_id']);
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
    }
};
