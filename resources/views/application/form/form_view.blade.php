@extends('app')

@section('title', 'Form create')
@section('contents')
    <form-view
        :data-form="{{json_encode($data_form)}}"
        :input-types="{{json_encode($input_fields)}}"
    ></form-view>
@endsection

