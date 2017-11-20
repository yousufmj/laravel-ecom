<?php

class UsersTableSeeder extends Seeder {

    public function run(){
        $user = new User;
        $user->firstname = 'yousuf';
        $user->lastname = 'mj';
        $user->email = 'yousufmjaleel@gmail.com ';
        $user->password = Hash::make('password');
        $user->telephone = '07876232611';
        $user->admin = 1;
        $user->save();
    }

}