@extends('layouts.todobase')

@section('title','検索結果')

@section('content')
<div class="main-header">
            <form action="/search" method="post">
            @csrf
                <div class="entry">
                    <input type="button" name="entry-button" id="entry-button" class="entry-button" value="作業登録" onclick="location.href='/entry'">
                </div>
                <div class="search">
                    <input type="text" name="search" id="search-button" class="search-button">
                    <input type="submit" value="🔍検索">
                </div>
            </form>
        </div>

        <table class="list">
            <tr>
                <th>項目名</th>
                <th>担当者</th>
                <th>登録日</th>
                <th>期限日</th>
                <th>完了日</th>
                <th>操作</th>
            </tr>
            @php
            $flg = 1;
            @endphp
            @foreach($items as $item)
                @if($flg == 1)
                    @php
                    $weo = "even";
                    $flg -= 1;
                    if(isset($item->finished_date)==false){
                        $weo = "warning";
                    }
                    @endphp
                @else($flg == 0)
                    @php
                    $weo = "odd";
                    $flg += 1;
                    if(isset($item->finished_date)==false)
                    {
                        $weo = "warning";
                    }
                    @endphp
                @endif
            <tr class="{{ $weo }} index-list">
            <td class="align-left">
            {{$item->item_name}}
            </td>
            <td class="align-left">
            {{$item->user}}
            </td>
            <td>
            {{$item->registration_date}}
            </td>
            <td>
            {{$item->expire_date}}
            </td>
            <td>
                @if(isset($item->finished_date)==true)
                
                    {{$item->finished_date}}
                
                @else
                
                    未
                
                @endif
            </td>
            <td>
            <form action="/searchfin" method="post">
                @csrf
                    <input type="hidden" name="search" value="{{ $search }}">
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <input type="submit" value="完了">
                </form>
                <form action="/edit?item_id={{$item->id}}" method="get">
                @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <input type="submit" value="更新">
                </form>
                <form action="/delete?item_id={{$item->id}}" method="get">
                @csrf
                    <input type="hidden" name="item_id" value="{{ $item->id }}">
                    <input type="submit" value="削除">
                </form>
                </td>
            </tr>
            @endforeach
        </table>

        <div class="main-footer">
            <form>
                <div class="goback">
                    <input type="button" value="戻る" onclick="location.href='/';">
                </div>
            </form>
        </div>
@endsection