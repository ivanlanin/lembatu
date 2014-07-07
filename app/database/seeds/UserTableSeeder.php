<?php
use Lembatu\Model\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->delete();
        User::create(array(
            'name'     => 'Admin',
            'username' => 'admin',
            'email'    => 'admin@apb-group.com',
            'password' => Hash::make('admin'),
        ));
    }
}
