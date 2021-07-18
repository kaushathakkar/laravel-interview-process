@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add an Opening</h1>
  <div>
    @if ($errors->any())
      <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
        </ul>
      </div><br />
    @endif
      <form method="post" action="{{ route('openings.store') }}">
          @csrf
          <div class="form-group">    
              <label for="job_title">Opening For:</label>
              <input type="text" class="form-control" name="job_title"/>
          </div>

          <div class="form-group">
              <label for="status">Status:</label>
              <select class="form-control" id="status">
                <option value="Active">Active</option>
                <option value="Inactive">Inactive</option>
                </select>
          </div>
          <button type="submit" class="btn btn-primary">Add candidate</button>
      </form>
  </div>
</div>
</div>
@endsection