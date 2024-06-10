@extends('layouts.template')
@section('content')

<body id="top">

  <header class="header" data-header>
    <div class="container">
      @include('layouts.nav')

      <div class="input-wrapper">
        <input type="search" name="search" placeholder="Search Anything..." class="input-field">

        <ion-icon name="search-outline" aria-hidden="true"></ion-icon>
      </div>

      
      <a href="#" class="logo">Logan Tactical Stock</a>
      <img src="{{ asset('assets/images/logan.png') }}" alt="Airsoftgun" style="width: 100px;">
      <div class="header-action">

        <button class="header-action-btn" aria-label="user">
          <ion-icon class="iconDiv" name="person-outline" aria-hidden="true"></ion-icon>
          <a href="#" class="iconText">Profile</a>
        </button>

        <button class="header-action-btn" aria-label="product list" onclick="window.location.href='/product'">
          <ion-icon class="iconDiv" name="bag-handle-outline" aria-hidden="true"></ion-icon>
          <a href="#" class="iconText">Product</a>
        </button>
        
        <button class="header-action-btn" aria-label="cart">
          <ion-icon class="iconDiv" name="business-outline" aria-hidden="true"></ion-icon>
          <a href="#" class="iconText">Management</a>
        </button>

      </div>

    </div>
  </header>

@endsection

<link rel="stylesheet" href="css/nav.css">