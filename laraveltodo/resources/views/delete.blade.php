@extends('layouts.todobase')

@section('title','削除確認')

@section('content')

<p>下記の項目を削除します。よろしいですか？</p>
        <form action="/delete" method="post">
        @csrf
            <input type="hidden" name="item_id" value="{{ $item_id }}">
            <table class="list" id="delete-list">
                <tr>
                    <th>項目名</th>
                    <td class="align-left">
                        {{ $Todo_item->item_name }}
                    </td>
                </tr>
                <tr>
                    <th>担当者</th>
                    <td class="align-left">
                    {{ $user->user }}
                    </td>
                </tr>
                <tr>
                    <th>期限</th>
                    <td class="align-left">
                    {{ $Todo_item->expire_date }}
                    </td>
                </tr>
                <tr>
                    <th>
                        完了
                    </th>
                    <td class="align-left">
                        @if(isset($Todo_item->finished_date))
                            {{ $Todo_item->finished_date }}
                        @else
                            未完了
                        @endif
                    </td>
                </tr>
            </table>

            <input type="submit" value="削除">
            <input type="button" value="キャンセル" onclick="location.href='/';">
        </form>



@endsection