@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Companies</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <div class=" ">
                    <a class="btn btn-primary btn-sm" href="{{route('companies.create')}}">
                        <i class="fas fa-plus-square">
                        </i>
                        Add Company
                    </a>
                    <ul class="pagination pagination-sm m-0 float-right">
                        {!! $companies->links()!!}
                    </ul>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 20%">
                            Company Name
                        </th>
                        <th style="width: 30%">
                            Company Address
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($companies as $company)
                        <tr>
                            <td>
                                {{$company->name}}
                            </td>
                            <td>
                                {{$company->address}}
                            </td>
                            <td class="project-actions text-right">

                                <a class="btn btn-info btn-sm" href="{{ route('companies.edit', $company) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>

                                <a class="btn btn-danger btn-sm" href="{{ route('companies.destroy', $company) }}"
                                   onclick="event.preventDefault();
                                       document.getElementById('delete-company-form-{{$company->id}}').submit();"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                                <form id="delete-company-form-{{$company->id}}"
                                      action="{{ route('companies.destroy', $company) }}" method="post" class="d-none">
                                    @csrf @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>
@endsection
