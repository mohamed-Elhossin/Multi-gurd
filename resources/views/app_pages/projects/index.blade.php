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

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">List Projects : <a class="float-end btn btn-info"
                                href="{{ route('project.create') }}">Create New <i class="fa-solid fa-circle-plus"></i> </a>
                        </h5>


                        <!-- Table with stripped rows -->
                        <table class="table datatable">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>

                                    <th scope="col">status</th>
                                    <th scope="col">Create_by</th>
                                    <th scope="col">Create_at</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($projects as $item)
                                    <tr>
                                        <th scope="row">{{ $loop->iteration }}</th>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->status }}</td>
                                        <td>{{ $item->user->name }}</td>
                                        <td>{{ $item->created_at }}</td>
                                        <th>
                                            <div class="dropdown">
                                                <a class="  " href="#" role="button" data-bs-toggle="dropdown"
                                                    aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis-vertical"></i>
                                                </a>

                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('project.show', $item->id) }}"><i
                                                                class="text-info fa-solid fa-eye"></i></a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('project.edit', $item->id) }}"><i
                                                                class="text-primary fa-solid fa-pen-to-square"></i></a></li>
                                                    <li><a class="dropdown-item"
                                                            href="{{ route('project.destroy', $item->id) }}"><i
                                                                class="text-danger fa-solid fa-trash-can"></i></a></li>
                                                </ul>
                                            </div>
                                        </th>
                                    </tr>
                                @empty
                                    <tr>
                                        <th colspan="5"> No Projects Added Yet </th>
                                    </tr>
                                @endforelse


                            </tbody>
                        </table>
                        <!-- End Table with stripped rows -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
