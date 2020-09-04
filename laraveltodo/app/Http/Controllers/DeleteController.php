<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Validation\Rule;
use App\Todo_item;
use App\User;
use App\Http\Requests\TodoRequest;

class DeleteController extends Controller
{
    public function delete(Request $request)
    {
        $Todo_item =Todo_item::find($request->item_id);
        $user = User::find($Todo_item->user_id);
        $item_id = $request->item_id;
        return view('delete',['Todo_item' => $Todo_item,'user' => $user,'item_id' => $item_id]);
    }

    public function remove(Request $request)
    {
        $Todo_item =Todo_item::find($request->item_id);

        $Todo_item->is_deleted = 1;

        $Todo_item->save();

        $items = Todo_item::where('is_deleted', 0)->get();
        return view('index',['items' => $items]);
    }
}
