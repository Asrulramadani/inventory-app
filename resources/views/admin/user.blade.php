@extends('template.default')

@php
    $title = "User | Inventory App"
@endphp

@section('content')
{{-- breadcrum --}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="{{@route('admin.user')}}">Admin</a></li>
      <li class="breadcrumb-item active" aria-current="page">Users</li>
    </ol>
</nav>

<div class="card mb-4">
    <livewire:user.index>
</div>
@endsection
