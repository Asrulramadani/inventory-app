@extends('template.default')

@php
    $title = 'Transaksi Keluar | Inventory App'
@endphp

@section('content')
    {{-- breadcrum --}}
<nav aria-label="breadcrumb">
    <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="/">Home</a></li>
      <li class="breadcrumb-item " aria-current="page">Transaksi</li>
      <li class="breadcrumb-item active" aria-current="page">Barang keluar</li>
    </ol>
</nav>

<div class="card mb-4">
    <livewire:transaction.out>
</div>
@endsection
