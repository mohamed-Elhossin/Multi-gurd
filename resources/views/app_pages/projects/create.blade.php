@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-lg-9 col-md-6">
                    <div class="card">
                        @if (Session::has('done'))
                            <div class="alert alert-success">
                                {{ Session::get('done') }}
                            </div>
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">Create New Project</h5>

                            <!-- No Labels Form -->
                            <form action="{{ route('project.store') }}" method="POST" class="row g-3"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="col-md-12">
                                    <input type="text" name="name" class="form-control" placeholder="Task Name">
                                </div>
                                <div class="col-md-6">
                                    <input type="text" name="description" class="form-control" placeholder="description">
                                </div>
                                <div class="col-md-6">
                                    <input type="file" name="file" class="form-control" placeholder="file">
                                </div>
                                <div class="col-12">
                                    <select name="status" class="form-control" id="">
                                        <option value="pending">pending</option>
                                        <option value="processing">processing</option>
                                        <option value="completed">completed</option>
                                        <option value="cancelled">cancelled</option>
                                    </select>
                                </div>


                                <div class="text-center">
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                    <button type="reset" class="btn btn-secondary">Reset</button>
                                </div>
                            </form><!-- End No Labels Form -->

                        </div>
                    </div>

                </div>
            </div>
        </div>

    </section>


@endsection
