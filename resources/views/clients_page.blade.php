@extends('layouts.app')

@section('content')
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0"> Clients</h1>
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
                    <a class="btn btn-primary btn-sm" href="{{route('clients.create')}}">
                        <i class="fas fa-plus-square">
                        </i>
                        Add Client
                    </a>
                    <ul class="pagination pagination-sm m-0 float-right">
                        {!! $clients->links()!!}
                    </ul>
                </div>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                    <tr>
                        <th style="width: 20%">
                            Name
                        </th>
                        <th style="width: 30%">
                            Email
                        </th>
                        <th style="width: 20%">
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                        <tr>
                            <td>
                                {{$client->name}}
                            </td>
                            <td>
                                {{$client->email}}
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{ route('clients.edit', $client) }}">
                                    <i class="fas fa-pencil-alt">
                                    </i>
                                    Edit
                                </a>
                                <a class="btn btn-danger btn-sm" href="{{ route('clients.destroy', $client) }}"
                                   onclick="event.preventDefault();
                                       document.getElementById('delete-company-form-{{$client->id}}').submit();"
                                   role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-trash">
                                    </i>
                                    Delete
                                </a>
                                <form id="delete-company-form-{{$client->id}}"
                                      action="{{ route('clients.destroy', $client) }}" method="post" class="d-none">
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
