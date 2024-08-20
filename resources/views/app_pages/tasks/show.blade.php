@extends('layouts.app')

@section('content')
    <div class="pagetitle">
        <h1>Data Tables</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                <li class="breadcrumb-item">Tables</li>
                <li class="breadcrumb-item active">Data</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
                @if (Session::has('done'))
                    <div class="alert alert-success">
                        {{ Session::get('done') }}
                    </div>
                @endif
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Show Projects : {{ $project->name }} <a class="float-end btn btn-info"
                                href="{{ route('project.create') }}">Create New <i class="fa-solid fa-circle-plus"></i> </a>
                        </h5>
                        <hr>
                        <h6>Description : {{ $project->description }}</h6>
                        <hr>
                        <h6>status : {{ $project->status }} <button type="button" class="btn btn-link"
                                data-bs-toggle="modal" data-bs-target="#staticBackdrop"> Edit Status </button> </h6>
                        <hr>
                        <h6>CreateBy : {{ $project->user->name }}</h6>
                        <hr>
                        <h6>created_at : {{ $project->created_at }}</h6>
                        <hr>
                        @if ($project->file != null)
                            <h6>Project_file_name : {{ $project->file }}</h6>
                            <hr>
                            <h6>Project_file_type : {{ $project->file_type }}</h6>
                            <hr>
                              <!-- End Table with stripped rows -->
                        <a href="{{ route("project.download_file", $project->id) }}" class="btn btn-success"> Download Project_file
                        </a>
                        @else
                            <h6> No File for This Project </h6>
                        @endif


                    </div>
                </div>

            </div>
        </div>
    </section>
    {{-- Model open to edit Status --}}


    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="staticBackdropLabel">Edit Project Status </h1>
                    <h5 class="modal-title"></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('project.update_status', $project->id) }}" method="POST">
                        @csrf
                        <div class="col-12">
                            <select name="status" class="form-control" id="">
                                <option value="pending">pending</option>
                                <option value="processing">processing</option>
                                <option value="completed">completed</option>
                                <option value="cancelled">cancelled</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info my-2">Save Change</button>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
