@extends('base') 
@section('main')
<div class="row">
    <div class="col-sm-8 offset-sm-2">
        <h1 class="display-3">Update a candidate</h1>

        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <br /> 
        @endif
        <form method="post" action="{{ route('candidates.update', $candidate->id) }}">
            @method('PATCH') 
            @csrf
            <div class="form-group">

                <label for="first_name">First Name:</label>
                <input type="text" class="form-control" name="first_name" value={{ $candidate->first_name }} />
            </div>

            <div class="form-group">
                <label for="last_name">Last Name:</label>
                <input type="text" class="form-control" name="last_name" value={{ $candidate->last_name }} />
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" class="form-control" name="email" value={{ $candidate->email }} />
            </div>
            <div class="form-group">
                <label for="job_profile">Job Title:</label>
                <input type="text" class="form-control" name="job_profile" value={{ $candidate->job_profile }} />
            </div>
            <div class="form-group">
                <label for="city">City:</label>
                <input type="text" class="form-control" name="city" value={{ $candidate->city }} />
            </div>
            <div class="form-group">
                <label for="country">Contact No:</label>
                <input type="text" class="form-control" name="contact" value={{ $candidate->contact }} />
            </div>
            <div class="form-group">
                <label for="qualification">Qualification:</label>
                <input type="text" class="form-control" name="qualification" value={{ $candidate->qualification }} />
            </div>
            <div class="form-group">
                <label for="is_fresher">Is Fresher?:</label>
                <input type="text" class="form-control" name="is_fresher" value={{ $candidate->is_fresher }} />
            </div>
            <div class="form-group">
                <label for="total_experience">Total Experience:</label>
                <input type="text" class="form-control" name="total_experience" value={{ $candidate->total_experience }} />
            </div>
            <div class="form-group">
                <label for="skills">Skills:</label>
                <input type="text" class="form-control" name="skills" value={{ $candidate->skills }} />
            </div>
            <div class="form-group">
                <label for="expected_ctc">Expected CTC:</label>
                <input type="text" class="form-control" name="expected_ctc" value={{ $candidate->expected_ctc }} />
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
</div>
@endsection