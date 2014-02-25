<?php
 
class AccountTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('account')->delete();
 
        Account::create(array(
            'account' => 'seller',
            'priviledge_level' => '1',
            'status' => 'act'
        ));

        Account::create(array(
            'account' => 'buyer',
            'priviledge_level' => '1',
            'status' => 'act'
        ));
 
        
    }
 
}