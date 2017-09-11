<?php

use App\Designation;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Spatie\Permission\Models\Role;

class AddDefaultRolesAndDesignations extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Role::create(['name'=>'Payer']);
        Role::create(['name'=>'Biller']);
        Designation::create(['name'=>'Chief Engineer']);
        Designation::create(['name'=>'Executive Engineer']);
        Designation::create(['name'=>'Account Officer']);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}