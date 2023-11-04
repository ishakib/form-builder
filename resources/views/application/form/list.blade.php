@extends('app')

@section('title', 'Form Submit')

@section('contents')
    <form-list
    :list="{{$list}}"></form-list>
@endsection

