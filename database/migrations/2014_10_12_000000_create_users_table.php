<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone');
            $table->string('role');
            $table->string('gender');
            $table->string('father_name')->nullable();
            $table->string('mother_name')->nullable();
            $table->string('class')->nullable();
            $table->string('institute')->nullable();
            $table->string('blood_group')->nullable();
            $table->string('nationality')->nullable();
            $table->string('present_address')->nullable();
            $table->string('permanent_address')->nullable();
            $table->string('nid')->nullable()->unique();
            $table->string('country')->nullable();
            $table->string('ssc')->nullable();
            $table->string('ssc_institute')->nullable();
            $table->string('ssc_year')->nullable();
            $table->string('ssc_grade')->nullable();
            $table->string('hsc')->nullable();
            $table->string('hsc_institute')->nullable();
            $table->string('hsc_year')->nullable();
            $table->string('hsc_grade')->nullable();
            $table->string('bsc')->nullable();
            $table->string('bsc_institute')->nullable();
            $table->string('bsc_year')->nullable();
            $table->string('bsc_grade')->nullable();
            $table->string('msc')->nullable();
            $table->string('msc_institute')->nullable();
            $table->string('msc_year')->nullable();
            $table->string('msc_grade')->nullable();
            $table->string('title')->nullable();
            $table->string('about')->nullable();
            $table->string('photo')->nullable();
            $table->string('membership')->nullable();
            $table->string('agreement')->nullable();
            $table->string('status')->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
