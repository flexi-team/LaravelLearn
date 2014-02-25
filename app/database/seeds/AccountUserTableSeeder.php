<?php
 
class AccountUserTableSeeder extends Seeder {
 
    public function run()
    {
        DB::table('account-user')->delete();
 
        AccUser::create(array(
            'account_id' => '1',
            'user_id' => '1',
            'status' => 'act'
        ));

   
 
        
    }
 
}