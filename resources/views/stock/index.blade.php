@extends('template.default')

@php
    $title = 'Stock | Inventory App'
@endphp

@section('content')
    {{-- breadcrum --}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Stocks</li>
    </ol>
</nav>

<div class="card mb-4">
    <livewire:stock.index>
</div>
@endsection
