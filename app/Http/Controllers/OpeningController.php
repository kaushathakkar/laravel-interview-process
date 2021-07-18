<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Opening;

class OpeningController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $openings = Opening::all();

        return view('openings.index', compact('openings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('openings.create');
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
            'job_title'=>'required',
            'status'=>'required'
        ]);

        $opening = new Candidate([
            'job_title' => $request->get('job_title'),
            'status' => $request->get('status')
        ]);
        $opening->save();
        return redirect('/openings')->with('success', 'Opening saved!');
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
        $opening = Opening::find($id);
        return view('openings.edit', compact('opening'));
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
            'job_title'=>'required',
            'status'=>'required'
        ]);

        $opening = Opening::find($id);
        $opening->first_name =  $request->get('job_title');
        $opening->last_name = $request->get('status');
        $opening->save();

        return redirect('/openings')->with('success', 'Opening updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $opening = Opening::find($id);
        $opening->delete();

        return redirect('/openings')->with('success', 'Opening deleted!');
    }
}
