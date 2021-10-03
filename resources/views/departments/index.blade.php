@extends('layouts.main')
@section('content')
<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Departments</h1>
</div>
<div class="row ">
    <div class="card mx-auto">
        <div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
        </div>
        <div class="card-header">
            <div class="row">
                <div class="col">
            <form class="form-inline" method="GET" action="{{ route('departments.index') }}">
                <div class="col">
                    <input type="search" name="search" class="form-control mb-2" id="inlineFormInput" placeholder="Search">
                </div>
                
                <div class="col">
                <button type="submit" class="btn btn-primary mb-2">Search</button>
                </div>
              </form>
                </div>
                <div>
                    <a href="{{ route('departments.create') }}" class="btn btn-primary mb-2">Create</a>
                </div>
            
        </div>
    </div>
        <div class="card-body">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#Id</th>
                        <th scope="col"> Department Name</th>
                        <th scope="col">Manage</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($departments as $department )
                    <tr>
                        <th scope="row">{{ $department->id }}</th>
                        <td>{{ $department->name }}</td>
                        <td class="">
                            <a href="{{route('departments.edit',$department->id)}}" class="btn btn-info">Edit</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection 