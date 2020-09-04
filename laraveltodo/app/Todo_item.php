<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use \Illuminate\Validation\Rule;

class Todo_item extends Model
{
    protected $guarded = array('id');

    /**
     * dbテーブルの関係性を記述。
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
