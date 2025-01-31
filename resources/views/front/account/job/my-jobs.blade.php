@extends('front.layouts.app')

@section('main')
<section class="section-5 bg-2">
    <div class="container py-5">
        <div class="row">
            <div class="col">
                <nav aria-label="breadcrumb" class=" rounded-3 p-3 mb-4">
                    <ol class="breadcrumb mb-0">
                        <li id="mine" class="breadcrumb-item"><a class="text-danger" href="{{ route('account.profile') }}">Account</a></li>
                        <li class="breadcrumb-item active">My Jobs</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-3">
                @include('front.account.sidebar')
            </div>
            <div class="col-lg-9">
                @include('front.message')
                <div class="card border-0 shadow mb-4 p-3">
                    <div class="card-body card-form">
                        <div class="d-flex justify-content-between">
                            <div>
                                <h3 class="fs-4 mb-1">My Jobs</h3>
                            </div>
                            <div style="margin-top: -10px;">
                                <a href="{{ route("account.createJob") }}" class="btn btn-danger">Post a Job</a>
                            </div>
                            
                        </div>
                        <div class="table-responsive">
                            <table class="table ">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">Title</th>
                                        <th scope="col">Job Created</th>
                                        <th scope="col">Salary</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody class="border-0">
                                    @if ($jobs->isNotEmpty())
                                        @foreach ($jobs as $job)
                                        <tr class="active">
                                            <td>
                                                <div class="job-name fw-500">{{ $job->title }}</div>
                                                <div class="info1 fw-600">{{ $job->jobType->name }} ◉ {{ $job->location }}</div>
                                            </td>
                                            <td>{{ \Carbon\Carbon::parse($job->created_at)->format('d M, Y') }}</td>
                                            <td>
                                            <div class="job-name fw-500">{{ $job->salary }}</div>
                                            </td>
                                            {{-- <td>0 Applications</td> --}}
                                            <td>
                                                @if ($job->status == 1)
                                                <div style="font-weight: bold; border-radius: 10px;" class="badge badge-pill bg-danger" disabled>Active</div>
                                                @else
                                                <div style="font-weight: bold; border-radius: 10px;" class="badge badge-pill bg-dark" disabled>Block</div>
                                                @endif                                    
                                            </td>
                                            <td>
                                                <div class="action-dots float-center">
                                                    <button href="#" class="btn" data-bs-toggle="dropdown" aria-expanded="false">
                                                        {{-- <i class="fa fa-ellipsis-v" aria-hidden="true"></i> --}}
                                                        <i class="fa-solid fa-wrench"></i>
                                                        <i class="fa-sharp fa-regular fa-sun"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end">
                                                        <li><a id="red-hover" class="dropdown-item" href="{{ route('jobDetail', $job->id) }}"> <i class="fa fa-eye" aria-hidden="true"></i> View</a></li>
                                                        <li><a id="red-hover" class="dropdown-item" href="{{ route('account.editJob', $job->id) }}"><i class="fa fa-edit" aria-hidden="true"></i> Edit</a></li>
                                                        <li><a id="red-hover" class="dropdown-item" href="#" onclick="deleteJob({{ $job->id }})" ><i class="fa fa-trash" aria-hidden="true"></i> Delete</a></li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                    @endif
                                    
                                    
                                </tbody>                                
                            </table>
                        </div>
                        <div>
                            {{ $jobs->links() }}
                        </div>
                    </div>
                </div>                
            </div>
        </div>
    </div>
</section>
@endsection
@section('customJs')
<script type="text/javascript">   
function deleteJob(jobId) {
    if (confirm("Are you sure you want to delete?")) {
        $.ajax({
            url : '{{ route("account.deleteJob") }}',
            type: 'post',
            data: {jobId: jobId},
            dataType: 'json',
            success: function(response) {
                window.location.href='{{ route("account.myJobs") }}';
            }
        });
    } 
}
</script>
@endsection