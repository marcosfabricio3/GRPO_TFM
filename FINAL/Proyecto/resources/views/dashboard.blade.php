@extends('layouts.app')
@section('title', 'Inicio')
@section('content')
@section('inicio_active', 'link-secondary')
<x-nav-bar />
<div id= "Carousel" class="carousel slide carousel-fade w-50 mx-auto" data-bs-ride="carousel" data-bs-interval="5000">
    <div class="carousel-indicators">
        <button type="button" data-bs-target="#Carousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#Carousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#Carousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
        <button type="button" data-bs-target="#Carousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="{{ Vite::asset('resources/images/Foto1.png') }}" class="d-block w-100" alt="Foto 1">
            <div class="carousel-caption d-none d-md-block">
                <h5>Equipamiento de última generacion</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ Vite::asset('resources/images/Foto2.png') }}" class="d-block w-100" alt="Foto 2">
            <div class="carousel-caption d-none d-md-block">
                <h5>Tu mejor versión empieza aquí</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ Vite::asset('resources/images/Foto3.png') }}" class="d-block w-100" alt="Foto 3">
            <div class="carousel-caption d-none d-md-block">
                <h5>Construí Fuerza, ganá confianza</h5>
            </div>
        </div>
        <div class="carousel-item">
            <img src="{{ Vite::asset('resources/images/Foto4.png') }}" class="d-block w-100" alt="Foto 4">
            <div class="carousel-caption d-none d-md-block">
                <h5>Movete hacia una vida más saludable</h5>
            </div>
        </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#Carousel" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#Carousel" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>