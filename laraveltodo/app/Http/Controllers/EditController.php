<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \Illuminate\Validation\Rule;
use App\Todo_item;
use App\User;
use App\Http\Requests\TodoRequest;

class EditController extends Controller
{
    public function edit(Request $request)
    {
        $items = User::where('is_deleted', 0)->get();
        $todoitem = Todo_item::find($request->item_id);
        $user = User::find($todoitem->user_id)->user;
        $userid = User::find($todoitem->user_id)->id;
        if(isset($todoitem->finished_date))
        {
            $finished = 1;
            $checked = 'checked';
        }else{
            $finished = null;
            $checked = null;
        }

        return view('edit',[
            'items' => $items,
            'form' => $todoitem,
            'user' => $user,
            'userid' => $userid,
            'item_id' => $request->item_id,
            'finished' => $finished,
            'checked' => $checked,
            ]);
    }

    public function update(TodoRequest $request)
    {
        $this->validate($request,TodoRequest::rules());
        if($request->finished)
        {
            $finished_date = date("Y-m-d");
        }else{
            $finished_date = null; 
        };
        $Todo_item =Todo_item::find($request->item_id);

        $Todo_item->user_id = $request->id;
        $Todo_item->item_name = $request->item_name;
        $Todo_item->expire_date = $request->expire_date;
        $Todo_item->finished_date = $finished_date;
        $Todo_item->updated_at = date("Y-m-d");

        $Todo_item->save();

        $items = Todo_item::where('is_deleted', 0)->get();
        return view('index',['items' => $items]);
    }
}
