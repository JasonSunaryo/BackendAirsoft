@extends('layouts.template')
@section('content')

<body id="top">

  <header class="header" data-header>
    <div class="container">
      @include('layouts.nav')

      
      <a href="#" class="logo">Logan Tactical Stock</a>
      <img src="{{ asset('assets/images/logan.png') }}" alt="Airsoftgun" style="width: 100px;">
      <div class="header-action">
        @if(Auth::check() && Auth::user()->role == 'admin')
        <button class="header-action-btn" aria-label="user">
          <ion-icon class="iconDiv" name="book-outline" aria-hidden="true"></ion-icon>
          <a href="/history" class="iconText">History</a>
        </button>

        <button class="header-action-btn" aria-label="product list" onclick="window.location.href='/product'">
          <ion-icon class="iconDiv" name="bag-handle-outline" aria-hidden="true"></ion-icon>
          <a href="#" class="iconText">Product</a>
        </button>
        
        <button class="header-action-btn" aria-label="cart">
          <ion-icon class="iconDiv" name="business-outline" aria-hidden="true"></ion-icon>
          <a href="/profit" class="iconText">Revenue</a>
        </button>
        @endif
      </div>

    </div>
  </header>

@endsec
<link rel="stylesheet" href="css/nav.css">