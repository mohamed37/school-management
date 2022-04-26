<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\User;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->delete();
        
        User::create(['name' => 'mohamed','email' => 'elmeleeh@app.com', 'password' => bcrypt('123456789')]);
        
    }
}
