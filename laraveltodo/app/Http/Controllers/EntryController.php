<?php

namespace App\Http\Controllers;
use Validator;

use Illuminate\Http\Request;
use \Illuminate\Validation\Rule;
use App\Todo_item;
use App\User;
use App\Http\Requests\TodoRequest;

class EntryController extends Controller
{    
    public function entry(Request $request)
    {
        $items = User::where('is_deleted', 0)->get();
        return view('entry',['items' => $items]);
    }
    
    public function create(TodoRequest $request)
    {
        $this->validate($request,TodoRequest::rules());
        if($request->finished)
        {
            $finished_date = date("Y-m-d");
        }else{
            $finished_date = null; 
        };
        $Todo_item =new Todo_item;

        $Todo_item->user_id = $request->id;
        $Todo_item->item_name = $request->item_name;
        $Todo_item->registration_date = date("Y-m-d");
        $Todo_item->expire_date = $request->expire_date;
        $Todo_item->finished_date = $finished_date;
        $Todo_item->created_at = date("Y-m-d");
        $Todo_item->updated_at = date("Y-m-d");

        $Todo_item->save();

        $items = Todo_item::where('is_deleted', 0)->get();
        return view('index',['items' => $items]);
    }

}
