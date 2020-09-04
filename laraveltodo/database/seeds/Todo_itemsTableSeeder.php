<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Todo_itemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $param = [
            'user_id' => '1',
            'item_name' => '作業１を実施する。',
            'registration_date' => '2020-01-30',
            'expire_date' => '2020-01-30',
            'finished_date' => null,
            'is_deleted' => 0,
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ];
        DB::table('todo_items')->insert($param);
        
        $param = [
            'user_id' => '2',
            'item_name' => '作業２の結果を報告する。',
            'registration_date' => '2020-01-30',
            'expire_date' => '2020-05-10',
            'finished_date' => '2020-05-10',
            'is_deleted' => 0,
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ];
        DB::table('todo_items')->insert($param);

        
        $param = [
            'user_id' => '3',
            'item_name' => '作業３はどうなっているのか尋ねる。',
            'registration_date' => '2020-01-30',
            'expire_date' => '2020-05-10',
            'finished_date' => '2020-05-10',
            'is_deleted' => 0,
            'created_at' => date("Y-m-d"),
            'updated_at' => date("Y-m-d"),
        ];
        DB::table('todo_items')->insert($param);
    }
}
