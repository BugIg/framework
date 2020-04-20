<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use AvoRed\Framework\Database\Models\Country;

class AvoredFrameworkSchema extends Migration
{
    /**
     * Install the AvoRed Address Module Schema.
     * @return void
     */
    public function up()
    {
        $tablePrefix = config('avored.table_prefix');

        Schema::create($tablePrefix . 'languages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->default(null);
            $table->string('code')->nullable()->default(null);
            $table->boolean('is_default')->default(false);
            $table->timestamps();
        });

        Schema::create($tablePrefix . 'roles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->default(null);
            $table->text('description')->nullable()->default(null);
            $table->timestamps();
        });

        Schema::create($tablePrefix . 'admin_users', function (Blueprint $table) use ($tablePrefix) {
            $table->bigIncrements('id');
            $table->tinyInteger('is_super_admin')->nullable()->default(null);
            $table->bigInteger('role_id')->unsigned()->default(null);
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->string('language')->nullable()->default('en');
            $table->string('image_path')->nullable()->default(null);
            $table->rememberToken();
            $table->timestamp('email_verified_at')->nullable();
            $table->timestamps();

            $table->foreign('role_id')
                ->references('id')
                ->on($tablePrefix . 'roles')
                ->onDelete('cascade');
        });

        Schema::create($tablePrefix . 'permissions', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->unique();
            $table->timestamps();
        });

        Schema::create($tablePrefix . 'permission_role', function (Blueprint $table) use ($tablePrefix) {
            $table->bigIncrements('id');
            $table->bigInteger('permission_id')->unsigned();
            $table->bigInteger('role_id')->unsigned();
            $table->timestamps();

            $table->foreign('permission_id')
                ->references('id')
                ->on($tablePrefix . 'permissions')
                ->onDelete('cascade');
            $table->foreign('role_id')
                ->references('id')
                ->on($tablePrefix . 'roles')
                ->onDelete('cascade');
        });

        Schema::create($tablePrefix . 'admin_password_resets', function (Blueprint $table) {
            $table->string('email')->index();
            $table->string('token')->index();
            $table->timestamp('created_at');
        });

        Schema::create($tablePrefix . 'categories', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('name')->nullable()->default(null);
            $table->json('slug')->nullable()->default(null);
            $table->string('meta_title')->nullable()->default(null);
            $table->string('meta_description')->nullable()->default(null);
            $table->timestamps();
        });

    }

    /**
     * Uninstall the AvoRed Address Module Schema.
     *
     * @return void
     */
    public function down()
    {
        $tablePrefix = config('avored.table_prefix');

        Schema::dropIfExists($tablePrefix . 'permission_role');
        Schema::dropIfExists($tablePrefix . 'permissions');
        Schema::dropIfExists($tablePrefix . 'admin_users');
        Schema::dropIfExists($tablePrefix . 'roles');
        Schema::dropIfExists($tablePrefix . 'admin_password_resets');
        Schema::dropIfExists($tablePrefix . 'categories');
        Schema::dropIfExists($tablePrefix . 'languages');

    }
}
