@extends('base')

@section('main')
<div class="row">
<div class="col-sm-12">

  @if(session()->get('success'))
    <div class="alert alert-success">
      {{ session()->get('success') }}  
    </div>
  @endif
</div>
<div class="col-sm-12">
    <h1 class="display-3">Openings</h1> 
    <div>
    <a style="margin: 19px;" href="{{ route('openings.create')}}" class="btn btn-primary">New opening</a>
    </div>     
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Job Title</td>
          <td>Status</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($openings as $opening)
        <tr>
            <td>{{$opening->id}}</td>
            <td>{{$opening->job_title}}</td>
            <td>{{$opening->status}}</td>
            <td>
                <a href="{{ route('openings.edit',$opening->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('openings.destroy', $opening->id)}}" method="post">
                  @csrf
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
  </table>
<div>
</div>
@endsection