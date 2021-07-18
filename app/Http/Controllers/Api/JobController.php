<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Carbon;
use App\Candidate;
use App\Opening;
use App\Followup;
use App\Interview;

class JobController extends Controller
{
    // Get all Active Job Openings
    public function getJobs()
    {
        $Openings = Opening::where('status', '=', 'Active')->get();
        return $Openings;
    }

    //Get today's interview
    public function getInterviews()
    {
        $todaysInterviews = Interview::whereDate('interview_time', Carbon::today())->with('candidates', 'openings')->get();        
        return $todaysInterviews;
    }

    //Add Followup to candidate
    public function postFollowup(Request $request)
    {        
        $validator = Validator::make($request->all(), [
            'candidate_id'=>'required|integer|exists:candidates,id',
            'user_id'=>'required|integer|exists:users,id',
            'opening_id'=>'required|integer|exists:openings,id',
            'interview_round'=>'required',
            'status'=>'required',
            'notes'=>'required'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $followup = new Followup([
            'candidate_id' => $request->get('candidate_id'),
            'user_id' => $request->get('user_id'),
            'opening_id' => $request->get('opening_id'),
            'interview_round' => $request->get('interview_round'),
            'status' => $request->get('status'),
            'notes' => $request->get('notes')
        ]);
        $followup->save();
        return response()->json([
            "message" => "candidate Interview added"
        ], 201);
    }

    //Set an interview
    public function postSetInterview(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'candidate_id'=>'required|integer|exists:candidates,id',
            'user_id'=>'required|integer|exists:users,id',
            'opening_id'=>'required|integer|exists:openings,id',
            'interview_time'=>'required|date_format:Y-m-d H:i:s|after_or_equal:now',
            'status'=>'required',
            'comments'=>'required'
        ]);

        if($validator->fails()){
            return response()->json(['errors' => $validator->errors()], 422);
        }

        $interview = new Interview([
            'candidate_id' => $request->get('candidate_id'),
            'user_id' => $request->get('user_id'),
            'opening_id' => $request->get('opening_id'),
            'interview_time' => $request->get('interview_time'),
            'status' => $request->get('status'),
            'comments' => $request->get('comments')
        ]);
        $interview->save();
        return response()->json([
            "message" => "candidate followup added"
        ], 201);
    }
}
