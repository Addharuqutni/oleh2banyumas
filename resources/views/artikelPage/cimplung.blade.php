@extends('layouts.index')

@section('title', 'Getuk Goreng - Snack Banyumas')

@section('content')
<div class="container-fluid py-5" style="background-color: #e8f5e9;">
    <!-- Main Header Section -->
    <div class="row mb-4">
        <div class="col-12 text-center">
            <h1 class="fw-bold mb-1">Oleh Oleh Makanan Ringan Banyumas</h1>
            <p class="text-muted">apa aja sih oleh-oleh makanan ringan khas dari Banyumas? berikut pilihannya</p>
        </div>
    </div>
    
    <!-- Featured Product Image -->
    <div class="row justify-content-center mb-4">
        <div class="col-12 col-md-8 col-lg-6 text-center">
            <div class="card border-0 rounded-4 overflow-hidden shadow-sm">
                <img src="https://radarbanyumas.disway.id/upload/21f2411871cc16ea65d41cc9f6f10379.jpg" 
                     class="card-img-top img-fluid" 
                     alt="Getuk Goreng"
                     style="max-height: 400px; object-fit: cover;">
            </div>
        </div>
    </div>
    
    <!-- Product Title -->
    <div class="row justify-content-center mb-4">
        <div class="col-12 text-center">
            <h2 class="fw-semibold fs-1">Getuk Goreng</h2>
        </div>
    </div>
    
    <!-- Product Description -->
    <div class="row justify-content-center">
        <div class="col-12 col-md-10 col-lg-8">
            <p class="text-muted fw-normal lh-base" style="text-align: justify;">
                There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, 
                by injected humour, or randomised words which don't look even slightly believable. If you are going to use a passage of 
                Lorem Ipsum, you need to be sure there isn't anything embarrassing hidden in the middle of text. All the Lorem Ipsum 
                generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the 
                Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate 
                Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected 
                humour, or non-characteristic words etc
            </p>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    body {
        background-color: #e8f5e9;
    }
    
    h1 {
        color: #333;
        font-size: 2.5rem;
    }
    
    h2 {
        color: #333;
        margin-top: 1.5rem;
        margin-bottom: 1.5rem;
    }
    
    .text-muted {
        color: #555 !important;
    }
    
    .rounded-4 {
        border-radius: 1rem !important;
    }
    
    /* Custom styling for the card */
    .card {
        background-color: transparent;
    }
    
    .card img {
        border-radius: 1rem;
    }
</style>
@endsection
