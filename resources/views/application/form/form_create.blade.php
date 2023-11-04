@extends('app')

@section('title', 'Form create')

@section('contents')
    <form-create
        :input-types="{{json_encode($input_fields)}}"
    ></form-create>
@endsection

