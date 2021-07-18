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
    <h1 class="display-3">Interviews</h1> 
    <div>
    <a style="margin: 19px;" href="{{ route('interviews.create')}}" class="btn btn-primary">New interview</a>
    </div>     
  <table class="table table-striped">
    <thead>
        <tr>
          <td>ID</td>
          <td>Candidate</td>
          <td>Opening</td>
          <td>Interview At</td>
          <td>Status</td>
          <td>Comments</td>
          <td colspan = 2>Actions</td>
        </tr>
    </thead>
    <tbody>
        @foreach($interviews as $interview)
        <tr>
            <td>{{$interview->id}}</td>
            <td>{{$interview->candidate_id }}</td>
            <td>{{$interview->opening_id}}</td>
            <td>{{$interview->interview_time}}</td>
            <td>{{$interview->status}}</td>
            <td>{{$interview->comments}}</td>
            <td>
                <a href="{{ route('interviews.edit',$interview->id)}}" class="btn btn-primary">Edit</a>
            </td>
            <td>
                <form action="{{ route('interviews.destroy', $interview->id)}}" method="post">
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