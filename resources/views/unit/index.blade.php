@extends('template.default')

@php
    $title = "Unit | Inventory App"
@endphp

@section('content')
{{-- breadcrum --}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item active" aria-current="page">Units</li>
    </ol>
</nav>

<div class="card mb-4">
    <livewire:unit.index>
</div>
@endsection
