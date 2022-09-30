<x-app-layout>
    <x-slot name="header">
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Create New Post') }}
      </h2>
    </x-slot>

        {{-- @extends('layouts.app') --}}

        {{-- @extends('template') --}}
        {{-- @section('title','入力ページ')
        @section('content') --}}
        <!-- コンテンツSTART -->
        {{-- <div class="container-fluid mt-2 mx-auto"> --}}
        <div class="container px-4 mx-auto md:flex md:items-center">
            <div class="flex justify-between items-center">
                <form>
                    <div class="form-group row">
                        {{Form::label('name','テキストフィールド',['class' => 'col-md-2 col-form-label text-left'])}}
                        {{Form::text('name',old('name'),['class'=>'col-md-5 form-control text-left','id'=>'name'])}}
                    </div>
                    <div class="form-group row">
                        {{Form::label('email','メール',['class' => 'col-md-2 col-form-label text-left'])}}
                        {{Form::email('email',old('email'),['class'=>'col-md-5 form-control text-left','id'=>'email'])}}
                    </div>
                    <div class="form-group row">
                        {{Form::label('password','パスワード',['class' => 'col-md-2 col-form-label text-left'])}}
                        {{Form::password('password',['class'=>'col-md-5 form-control text-left','id'=>'password'])}}
                    </div>
                    <div class="form-group row ">
                        {{Form::label('radio','ラジオボタン',['class' => 'col-md-2 col-form-label text-left'])}}
                        <div class="form-check col-md-0 d-flex align-self-center pr-2">
                            {{Form::radio('radio','ra',false,['class'=>'col-md-0 form-check-input','id'=>'ra'])}}
                            {{Form::label('ra','ラ',['class' => 'col-md-0 form-check-label text-left'])}}
                        </div>
                        <div class="form-check col-md-0 d-flex align-items-center pr-2">
                            {{Form::radio('radio','di',false,['class'=>'col-md-0 form-check-input','id'=>'di'])}}
                            {{Form::label('di','ジ',['class' => 'col-md-0 form-check-label text-left'])}}
                        </div>
                        <div class="form-check col-md-0 d-flex align-items-center pr-2">
                            {{Form::radio('radio','o',false,['class'=>'col-md-0 form-check-input','id'=>'o'])}}
                            {{Form::label('o','オ',['class' => 'col-md-0 form-check-label text-left'])}}
                        </div>
                        <div class="form-check col-md-0 d-flex align-items-center pr-2">
                            {{Form::radio('radio','bu',false,['class'=>'col-md-0 form-check-input','id'=>'bu'])}}
                            {{Form::label('bu','ボ',['class' => 'col-md-0 form-check-label text-left'])}}
                        </div>
                        <div class="form-check col-md-0 d-flex align-items-center pr-2">
                            {{Form::radio('radio','tt',false,['class'=>'col-md-0 form-check-input','id'=>'tt'])}}
                            {{Form::label('tt','タ',['class' => 'col-md-0 form-check-label text-left'])}}
                        </div>
                        <div class="form-check col-md-0 d-flex align-items-center pr-2">
                            {{Form::radio('radio','on',false,['class'=>'col-md-0 form-check-input','id'=>'on'])}}
                            {{Form::label('on','ン',['class' => 'col-md-0 form-check-label text-left'])}}
                        </div>
                    </div>
                    <div class="form-group row ">
                        {{Form::label('radio','チェックボックス',['class' => 'col-md-2 col-form-label text-left'])}}
                        <div class="form-check col-md-0 d-flex align-items-center pr-2">
                            {{Form::checkbox('check','ch',false,['class'=>'col-md-0 form-check-input','id'=>'ch'])}}
                            {{Form::label('ch','チェ',['class' => 'col-md-0 form-check-label text-left'])}}
                        </div>
                        <div class="form-check col-md-0 d-flex align-items-center pr-2">
                            {{Form::checkbox('check','ch',false,['class'=>'col-md-0 form-check-input','id'=>'eck'])}}
                            {{Form::label('eck','ック',['class' => 'col-md-0 form-check-label text-left'])}}
                        </div>
                        <div class="form-check col-md-0 d-flex align-items-center pr-2">
                            {{Form::checkbox('check','ch',false,['class'=>'col-md-0 form-check-input','id'=>'bo'])}}
                            {{Form::label('bo','ボッ',['class' => 'col-md-0 form-check-label text-left'])}}
                        </div>
                        <div class="form-check col-md-0 d-flex align-items-center pr-2">
                            {{Form::checkbox('check','ch',false,['class'=>'col-md-0 form-check-input','id'=>'x'])}}
                            {{Form::label('x','クス',['class' => 'col-md-0 form-check-label text-left'])}}
                        </div>
                    </div>
                    <div class="form-group row ">
                        {{Form::label('select','セレクトボックス',['class' => 'col-md-2 col-form-label text-left','id'=>'select'])}}
                        {{Form::select('select',[
                            'セ'=>['se'=>'セ'],
                            'レ'=>['le'=>'レ'],
                            'ク'=>['c'=>'ク'],
                            'ト'=>['t'=>'レ'],
                        ],null,['class' => 'col-md-5 form-control text-left'])}}

                    </div>
                    <div class="form-group row ">
                        {{Form::label('textarea',"テキストエリア",['class' => 'col-md-2 col-form-label text-left'])}}
                        {{Form::textarea('textarea',null,['class' => 'col-md-5 form-control'])}}
                    </div>
                    <div class="form-group row ">
                        {{Form::label('date',"カレンダー（日）",['class' => 'col-md-2 col-form-label text-left'])}}
                        {!! Form::date('date', null, ['class' => 'col-md-5 form-control']) !!}
                    </div>
                    <div class="form-group row ">
                        {{Form::label('date',"カレンダー（日時）",['class' => 'col-md-2 col-form-label text-left'])}}
                        {!! Form::datetimeLocal('date', null, ['class' => 'col-md-5 form-control']) !!}
                    </div>
                    <div class="form-group row ">
                        {{Form::label('number','数値',['class' => 'col-md-2 col-form-label text-left'])}}
                        {!! Form::number('number', null, ['class' => 'col-md-5 col-form-label text-left']) !!}
                    </div>
                    <div class="form-group row ">
                        {{Form::label('number',"ボタン各種",['class' => 'col-md-2 col-form-label text-left'])}}
                        {!! Form::submit('サブミット',['class' => 'btn btn-primary mr-1']) !!}
                        {!! Form::button('ボタン',['class' => 'btn btn-primary mr-1']) !!}
                        {!! Form::reset('リセット',['class' => 'btn btn-primary mr-1']) !!}
                    </div>
                </form>
            </div>
        </div>
        {{-- @endsection --}}
    </x-app-layout>
