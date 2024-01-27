@extends('template.default')

@php
    $title = 'My Profile | Inventory App'
@endphp

@section('content')

    {{-- breadcrum --}}
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/">Home</a></li>
          <li class="breadcrumb-item active" aria-current="page">My-profile</li>
        </ol>
    </nav>

<livewire:my-profile.index/>
@endsection
