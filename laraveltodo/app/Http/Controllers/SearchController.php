<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Todo_item;

class SearchController extends Controller
{
    public static function show(Request $request)
    {
        $search = $request->search;
        //二つのテーブルを結合
        $items = Todo_item::with('User')
            ->join('users','users.id','=','Todo_items.user_id')
            ->where('users.is_deleted','=',0)
            ->where('Todo_items.is_deleted','=',0)
            //検索条件のor部分を無名関数でネスト
            //use($search)で変数の利用範囲を拡大
            ->where(function($query)use($search){
                $query->where('item_name','like','%' . $search . '%')
                ->orwhere('registration_date','like',$search)
                ->orwhere('expire_date','like',$search)
                ->orwhere('finished_date','like',$search)
                ->orwhere('name','like','%' . $search . '%')
                ->orwhere('family_name','like','%' . $search . '%')
                ->orwhere('first_name','like','%' . $search . '%');
            }) 
            ->select('Todo_items.id','item_name','user','registration_date','expire_date','finished_date')
            ->get();

            return view('search',['items' => $items,'search' => $search]);
    }

    
}
