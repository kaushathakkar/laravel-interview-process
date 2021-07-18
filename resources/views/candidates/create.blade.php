@extends('base')

@section('main')
<div class="row">
 <div class="col-sm-8 offset-sm-2">
    <h1 class="display-3">Add a candidate</h1>
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
      <form method="post" action="{{ route('candidates.store') }}">
          @csrf
          <div class="form-group">    
              <label for="first_name">First Name:</label>
              <input type="text" class="form-control" name="first_name"/>
          </div>

          <div class="form-group">
              <label for="last_name">Last Name:</label>
              <input type="text" class="form-control" name="last_name"/>
          </div>

          <div class="form-group">
              <label for="email">Email:</label>
              <input type="text" class="form-control" name="email"/>
          </div>
          <div class="form-group">
              <label for="job_profile">Job Title:</label>
              <input type="text" class="form-control" name="job_profile"/>
          </div>
          <div class="form-group">
              <label for="city">City:</label>
              <input type="text" class="form-control" name="city"/>
          </div>
          <div class="form-group">
              <label for="country">Contact No:</label>
              <input type="text" class="form-control" name="contact"/>
          </div>
          <div class="form-group">
              <label for="qualification">Qualification:</label>
              <input type="text" class="form-control" name="qualification"/>
          </div>
          <div class="form-group">
              <label for="is_fresher">Is Fresher?:</label>
              <input type="text" class="form-control" name="is_fresher"/>
          </div>
          <div class="form-group">
              <label for="total_experience">Total Experience:</label>
              <input type="text" class="form-control" name="total_experience"/>
          </div>
          <div class="form-group">
              <label for="skills">Skills:</label>
              <input type="text" class="form-control" name="skills"/>
          </div>
          <div class="form-group">
              <label for="expected_ctc">Expected CTC:</label>
              <input type="text" class="form-control" name="expected_ctc"/>
          </div>                         
          <button type="submit" class="btn btn-primary">Add candidate</button>
      </form>
  </div>
</div>
</div>
@endsection