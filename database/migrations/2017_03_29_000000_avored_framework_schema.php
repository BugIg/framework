<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;

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

        Schema::create($tablePrefix . 'pages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('name')->nullable()->default(null);
            $table->json('slug')->nullable()->default(null);
            $table->json('content')->nullable()->default(null);
            $table->json('meta_title')->nullable()->default(null);
            $table->json('meta_description')->nullable()->default(null);
            $table->timestamps();
        });

        Schema::create($tablePrefix .'currencies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->default(null);
            $table->string('code')->nullable()->default(null);
            $table->string('symbol')->nullable()->default(null);
            $table->float('conversation_rate');
            $table->enum('status', ['ENABLED', 'DISABLED'])->nullable()->default(null);
            $table->timestamps();
        });

        Schema::create($tablePrefix . 'properties', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('name');
            $table->json('slug');
            $table->enum('data_type', ['INTEGER', 'DECIMAL', 'DATETIME', 'VARCHAR', 'BOOLEAN', 'TEXT'])
                ->nullable()
                ->default(null);
            $table->enum(
                'field_type',
                ['TEXT', 'TEXTAREA', 'CKEDITOR', 'SELECT', 'FILE', 'DATETIME', 'RADIO', 'SWITCH']
            );
            $table->tinyInteger('use_for_all_products')->default(0);
            $table->tinyInteger('use_for_category_filter')->default(0);
            $table->tinyInteger('is_visible_frontend')->nullable()->default(1);
            $table->integer('sort_order')->nullable()->default(0);
            $table->timestamps();
        });

        Schema::create($tablePrefix . 'attributes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->json('name');
            $table->json('slug');
            $table->enum('display_as', ['IMAGE', 'TEXT'])->default('TEXT');
            $table->timestamps();
        });

        Schema::create($tablePrefix . 'countries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable()->default(null);
            $table->string('code')->nullable()->default(null);
            $table->string('phone_code')->nullable()->default(null);
            $table->string('currency_code')->nullable()->default(null);
            $table->string('currency_symbol')->nullable()->default(null);
            $table->string('lang_code')->nullable()->default(null);
            $table->timestamps();
        });

        $path = __DIR__.'/../../assets/countries.json';
        $json = json_decode(file_get_contents($path), true);

        foreach ($json as $country) {
            DB::table($tablePrefix . 'countries')
                ->insert([
                    'name' => Arr::get($country, 'name'),
                    'code' => strtolower(Arr::get($country, 'alpha2Code')),
                    'phone_code' => Arr::get($country, 'callingCodes.0'),
                    'currency_code' => Arr::get($country, 'currencies.0.code'),
                    'currency_symbol' => Arr::get($country, 'currencies.0.symbol'),
                    'lang_code' => Arr::get($country, 'languages.0.name'),
                ]);
        }


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
        Schema::dropIfExists($tablePrefix . 'countries');
        Schema::dropIfExists($tablePrefix . 'currencies');
        Schema::dropIfExists($tablePrefix . 'pages');


        Schema::dropIfExists($tablePrefix . 'properties');
        Schema::dropIfExists($tablePrefix . 'attributes');

    }
}
