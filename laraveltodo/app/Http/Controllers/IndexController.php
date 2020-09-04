<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Todo_item;

class IndexController extends Controller
{
    public function index(Request $request)
    {
        $items = Todo_item::where('is_deleted', 0)->get();
        return view('index',['items' => $items]);
    }

    public function finished(Request $request)
    {
        $Todo_item = Todo_item::find($request->item_id);

        $Todo_item->finished_date = date("Y-m-d");
        $Todo_item->save();

        $items = Todo_item::where('is_deleted', 0)->get();
        return view('index',['items' => $items]);
    }
}
