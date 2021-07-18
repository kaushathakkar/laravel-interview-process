<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Candidate;

class CandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $candidates = Candidate::all();

        return view('candidates.index', compact('candidates'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('candidates.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required|email|unique:candidates'
        ]);

        $candidate = new Candidate([
            'first_name' => $request->get('first_name'),
            'last_name' => $request->get('last_name'),
            'email' => $request->get('email'),
            'job_profile' => $request->get('job_profile'),
            'city' => $request->get('city'),
            'contact' => $request->get('contact'),
            'qualification' => $request->get('qualification'),
            'is_fresher' => $request->get('is_fresher'),
            'total_experience' => $request->get('total_experience'),
            'skills' => $request->get('skills'),
            'expected_ctc' => $request->get('expected_ctc')
        ]);
        $candidate->save();
        return redirect('/candidates')->with('success', 'Candidate saved!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $candidate = Candidate::find($id);
        return view('candidates.edit', compact('candidate')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'first_name'=>'required',
            'last_name'=>'required',
            'email'=>'required'
        ]);

        $candidate = Candidate::find($id);
        $candidate->first_name =  $request->get('first_name');
        $candidate->last_name = $request->get('last_name');
        $candidate->email = $request->get('email');
        $candidate->job_profile = $request->get('job_profile');
        $candidate->city = $request->get('city');
        $candidate->qualification = $request->get('qualification');
        $candidate->is_fresher = $request->get('is_fresher');
        $candidate->total_experience = $request->get('total_experience');
        $candidate->skills = $request->get('skills');
        $candidate->expected_ctc = $request->get('expected_ctc');
        $candidate->save();

        return redirect('/candidates')->with('success', 'Candidate updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $candidate = Candidate::find($id);
        $candidate->delete();

        return redirect('/candidates')->with('success', 'Candidate deleted!');
    }
}
