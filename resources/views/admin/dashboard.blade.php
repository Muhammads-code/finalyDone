@extends('front.layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">

                    <ol class="breadcrumb mb-0">
<li id="mine" class="breadcrumb-item"><a class="text-danger" href="{{ route("admin.dashboard") }}">Admin</a></li>
<li class="breadcrumb-item active">Dashboard</li>
                    </ol>

                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('admin.sidebar')
            </div>
            <div class="col-lg-9">
                @include('front.message')
                {{-- Greetings admin --}}
                <div class="card border-1 shadow mb-1 affect">
                   <div id="mine" class="card-body dashboard text-center">
                    <i class="fa-regular fa-face-grin-stars fs-1"></i>
                    <p class="h1">Welcome <br> Administrator!!</p>
                    <i class="fa-regular fa-face-grin-stars fs-1"></i>
                   </div>
                </div>                          
            </div>
        </div>
    </div>
</section>
@endsection

@section('customJs')
@endsection