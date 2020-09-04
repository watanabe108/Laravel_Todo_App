<?php

use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'name' => '山田太郎',
            'user' => 'test1',
            'family_name' => '山田',
            'first_name' => '太郎',
            'email' => 'taro@yamada.com',
            'password' => Hash::make('test1'),
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'name' => '山田花子',
            'user' => 'test2',
            'family_name' => '山田',
            'first_name' => '花子',
            'email' => 'hanako@flower.com',
            'password' => Hash::make('test2'),
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ];
        DB::table('users')->insert($param);
        
        $param = [
            'name' => '田中幸子',
            'user' => 'test3',
            'family_name' => '田中',
            'first_name' => '幸子',
            'email' => 'sachiko@happy.com',
            'password' => Hash::make('test3'),
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ];
        DB::table('users')->insert($param);
    }
}
