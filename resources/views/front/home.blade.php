@extends('front.layouts.app')

@section('main')

{{--################################# hero section --}}
<section class="section-0 lazy d-flex bg-image-style dark align-items-center "  class="" data-bg="{{ asset('assets/images/banner77.png') }}">
    <div class="container">
        <div class="row">
            <div class="col-12 col-xl-8">
                <h1 id="hollow">Find your dream job</h1>
                <p id="para">Hundreds of jobs available.</p>
                <div class="banner-btn mt-5"><a href="#jobs99" class="btn btn-danger mb-4 mb-sm-0 marak">Explore Now</a></div>
            
            </div>
        </div>
    </div>
</section>

{{--############################### serch section --}}
<section class="section-1 py-5 "> 
    <div class="container">
        <div class="card border-1 shadow p-5">

{{-- form --}}
<form action="{{ route("jobs") }}" method="GET">
    {{-- cities to work --}}
    <div class="mb-3 fs-5 fw-2">
        <span class="badge rounded-pill bg-danger"> Available only in</span>
        <span class="text-danger"><i class="fa-regular fa-face-grin-stars"></i></span>
        <span class="badge rounded-pill bg-dark">Lahore</span>
        <span class="badge rounded-pill bg-dark">Karachi</span>
        <span class="badge rounded-pill bg-dark">Islamabad</span>
        </div>


<div class="row">
    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
        <input type="text" class="form-control" name="keyword" id="keyword" placeholder="Keywords">
    </div>
    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
        <input type="text" class="form-control" name="location" id="location" placeholder="Location">
    </div>
    <div class="col-md-3 mb-3 mb-sm-3 mb-lg-0">
        <select name="category" id="category" class="form-control">
            <option value="">Select a Category</option>
            @if ($newCategories->isNotEmpty())
                @foreach ($newCategories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>  
                @endforeach
            @endif
        </select>
    </div>

    {{-- button --}}
    <div class=" col-md-3 mb-xs-3 mb-sm-3 mb-lg-0">
        <div class="d-grid gap-2">
            {{-- <a href="jobs.html" class="btn btn-danger btn-block">Search</a> --}}
            <button type="submit" class="btn btn-danger btn-block">Serch</button>
        </div>
        
    </div>

                </div> 
            </form>           
        </div>
    </div>
</section>

{{-- ######################### Popular Categories --}}
<section id="jobs99" class="section-2 bg-2 py-5">
    <div class="container">
        <h3>  <span id="mine1"> <i class="fa-solid fa-circle-dot"></i> Popular Categories</span></h3>

        <div class="row pt-5">

            {{-- dynamic work --}}
            @if ($categories->isNotEmpty())
            @foreach ($categories as $category)

            {{-- clickable div --}}
            <a class="border-1 shadow col-lg-4 col-xl-3 col-md-6 m-1 text-dark single_catagory" href="{{ route('jobs'). '?category='.$category->id  }}"><h4 class="pb-2">{{ $category->name }}</h4>
                <p class="mb-0"> We need your services<span class="text-danger fs-5">...<i class="fas fa-exclamation-circle"></i></span></p>    
            </a>
                
            @endforeach
                
            @endif

        </div>
    </div>
</section>

{{-- ########################## Featured Jobs --}}
<section class="section-3  py-5">
    <div class="container">
        <h3>  <span id="mine1"> <i class="fa-solid fa-circle-dot"></i> Featured Jobs</span></h3>

        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">
                        @if ($featuredJobs->isNotEmpty())
                            @foreach ($featuredJobs as $featuredJob)
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">
                                        {{-- visit homeController to rise number of featured jobs--}}
                                        <h3 class="border-0 fs-5 pb-2 mb-0">{{ $featuredJob->title }}</h3>
                                        
                                        {{-- how many words to print form db --}}
                                        <p>{{ Str::words(strip_tags($featuredJob->description), 6) }}</p>

                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder fs-6"><i class="fa-solid fa-location-dot"></i></span>
                                                <span class="ps-1">{{ $featuredJob->location }}</span>
                                            </p>

                                            <p class="mb-0">
                                                <span class="fw-bolder fs-6"><i class="fa-solid fa-laptop-code"></i></span>
                                                <span class="ps-1">{{ $featuredJob->jobType->name }}</span>
                                            </p>

                                            <p class="mb-0">
                                                <span class="fw-bolder fs-6"><i class="fa-regular fa-clock"></i></i></span>
                                                <span class="ps-1">{{ $featuredJob->created_at->format('Y-M-d') }}</span>
                                            </p>

                                            @if (!is_null($featuredJob->salary))
                                            <p class="mb-0">
                                                {{-- <span class="fw-bolder"><i class="fa fa-usd"></i></span> --}}
                                                <span class="fw-bolder fs-6"><i class="fa-solid fa-dollar-sign"></i></span>
                                                <span class="ps-1">{{ $featuredJob->salary }}</span>
                                            </p>
                                            @endif                                            
                                        </div>
    
                                        <div class="d-grid mt-3">
                                            <a href="{{ route('jobDetail',$featuredJob->id) }}" class="btn btn-danger btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ####################### Latest Jobs --}}
<section class="section-3 bg-2 py-5">
    <div class="container">
        <h3>  <span id="mine1"> <i class="fa-solid fa-circle-dot"></i> Latest Jobs</span></h3>

        <div class="row pt-5">
            <div class="job_listing_area">                    
                <div class="job_lists">
                    <div class="row">
                        @if ($latestJobs->isNotEmpty())
                            @foreach ($latestJobs as $latestJob)
                            <div class="col-md-4">
                                <div class="card border-0 p-3 shadow mb-4">
                                    <div class="card-body">

                                        <h3 class="border-0 fs-5 pb-2 mb-0">{{ $latestJob->title }}</h3>
                                        {{-- to show number of jobs showing on home --}}
                                        <p>{{ Str::words(strip_tags($latestJob->description), 6) }}</p>

                                        <div class="bg-light p-3 border">
                                            <p class="mb-0">
                                                <span class="fw-bolder fs-6"><i class="fa-solid fa-location-dot"></i></span>
                                                <span class="ps-1">{{ $latestJob->location }}</span>
                                            </p>

                                            <p class="mb-0">
                                                <span class="fw-bolder fs-6"><i class="fa-solid fa-laptop-code"></i></span>
                                                <span class="ps-1">{{ $latestJob->jobType->name }}</span>
                                            </p>

                                            <p class="mb-0">
                                                <span class="fw-bolder fs-6"><i class="fa-regular fa-clock"></i></span>
                                                <span class="ps-1">{{ $featuredJob->created_at->format('Y-M-d') }}</span>
                                            </p>

                                            @if (!is_null($latestJob->salary))
                                            <p class="mb-0">
                                                <span class="fw-bolder fs-6"><i class="fa-solid fa-dollar-sign"></i></span>
                                                <span class="ps-1">{{ $latestJob->salary }}</span>
                                            </p>
                                            @endif                                            
                                        </div>
    
                                        <div class="d-grid mt-3">
                                            <a href="{{ route('jobDetail',$latestJob->id) }}" class="btn btn-danger btn-lg">Details</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @endif                                                 
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

@endsection