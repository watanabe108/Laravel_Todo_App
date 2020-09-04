@extends('layouts.todobase')

@section('title','作業更新')

@section('content')
    @if (count($errors) > 0)
    <div>
        <ul >
            @foreach ($errors->all() as $error)
                <li class="error">{{ $error }}</li>
            @endforeach
        </ul>
    </div> 
    @endif
        <form action="/edit?item_id=$item_id" method="post">
        @csrf
            <input type="hidden" name="item_id" value= "{{ $item_id }}">
            <table class="list">
                <tr>
                    <th>項目名</th>
                    <td class="align-left">
                        <input type="text" name="item_name" id="item_name" class="item_name" value = "{{ $form->item_name }}" placeholder="登録内容をここに入力します">
                    </td>
                </tr>
                <tr>
                    <th>担当者</th>
                    <td class="align-left">
                        <select name="id" id="user_id" class="user_id">
                        <option value="{{$userid}}" selected>{{ $user }}</option>
                            @foreach ($items as $item)
                            <option value="{{$item->id}}">{{ $item->user }}</option>
                            @endforeach
                        </select>
                    </td>
                </tr>
                <tr>
                    <th>期限</th>
                    <td class="align-left">
                        <input type="date" name="expire_date" id="expire_date" class="expire_date" value="{{$form->expire_date}}">
                    </td>
                </tr>
                <tr>
                    <th>
                        完了
                    </th>
                    <td class="align-left">
                        <input type="checkbox" name="finished" id="finished" class="finished" value="1" size="8" {{ $checked }} > 完了
                    </td>
                </tr>
            </table>

            <input type="submit" value="更新">
            <input type="button" value="キャンセル" onclick="location.href='/';">
        </form>

@endsection