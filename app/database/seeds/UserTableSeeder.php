<?php
 
class UserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('user')->delete();
 
        User::create(array(
            'name' => 'Promsopheak Nuon',
            'email' => 'admin@admin.com',
            'name' => 'Admin',
            'location' => 'Phnom Penh',
            'latitude' => 11.558831,
            'longitude' => 104.917445,
            'status' => 'act',
            'password' => Hash::make('123')
        ));
 
        
    }
 
}