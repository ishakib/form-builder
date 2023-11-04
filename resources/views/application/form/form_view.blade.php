@extends('app')

@section('title', 'Form create')
@section('contents')
    <form-view
        :data-form="{{json_encode($data_form)}}"
    ></form-view>
@endsection

