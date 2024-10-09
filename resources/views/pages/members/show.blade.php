@extends('layouts.app')

@section('content')
<div class="page-heading">
    <div class="page-title mb-3">
        <h3>
            <span class="bi bi-building"></span>
            Show New - members
        </h3>
    </div>

    <section class="section">
        <div class="card">
            <div class="card-body">
                    
                <table class="table table-striped table-bordered"> 
                <tr>
                    <th>Name</th> 
                    <td><strong>#{{ $members->name }}</strong></td>
                </tr>
                <tr>
                    <th>Email</th> 
                    <td><strong>#{{ $members->email }}</strong></td>
                </tr>
                <tr>
                    <td>Password</td>
                    <td>{{ $members->password }}</td>
                </tr>
                <tr>
                    <td>Role</td>
                    <td>{{ $members->role }}</td>
                </tr>
                <tr>
                    <td>Created At</td>
                    <td>{{ Carbon\Carbon::parse($members->created_at )->isoFormat('DD MMM Y HH:mm')}}</td>
                </tr>
                <tr>
                    <td>Update At</td>
                    <td>{{ Carbon\Carbon::parse( $members->update_at)->isoFormat('DD MMM Y HH:mm') }}</td>
                </tr>

                <td>
                <a href="{{ route('admin.members.index')}}" class="btn btn-sm btn-primary mb-2">
                    <span class="bi bi-arrow-left"></span>
                Kembali</a>
                </td>

                </table>

            </div>
        </div>  
    </section>

</div>
@endsection