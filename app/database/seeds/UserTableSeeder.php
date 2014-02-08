<?php
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('users')->delete();
 
        User::create(array(
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'name' => 'admin',
            'password' => Hash::make('123')
        ));
 
        User::create(array(
            'username' => 'pheak@admin.com',
            'email' => 'pheak@admin.com',
            'name' => 'pheak',
            'password' => Hash::make('123')
        ));
    }
 
}