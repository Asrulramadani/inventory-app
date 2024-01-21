@extends('template.default')

@php
    $title = 'Dashboard | Inventory App'
@endphp

@section('content')

<h3>Dashboard</h3>
<livewire:dashboard.index/>
@endsection
