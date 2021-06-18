<?php

namespace App\Http\Controllers;

use App\Partylist;
use App\Officer;
use App\Candidate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class AdminCandidateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkIfIsAdmin');
        $this->middleware('checkIfHasOfficer')->except('index');
    }
    public function index()
    {
        return view('candidates.index')->with('candidates', Candidate::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = [
            'officers' => Officer::all(),
            'partylists' => Partylist::all(),
        ];
        return view('candidates.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $data['image'] = time() . '_' . $request->image->getClientOriginalName();
        $request->image->storeAs('candidate_images', $data['image'], 'public');
        Candidate::create($data);
        return redirect(route('candidates.index'))->with('success', 'A new candidate has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Candidate $candidate)
    {
        return view('candidates.show')->with('candidate', $candidate);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Candidate $candidate)
    {
        $officers = Officer::all();
        $data = [
            'officers' => $officers,
            'candidate' => $candidate,
            'partylists' => Partylist::all(),
        ];
        return view('candidates.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Candidate $candidate)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            Storage::delete('public/candidate_images/' . $candidate->image);
            $data['image'] = time() . '_' . $request->image->getClientOriginalName();
            $request->image->storeAs('candidate_images', $data['image'], 'public');
        }
        $candidate->update($data);
        return redirect(route('candidates.index'))->with('success', 'A candidate has been updated successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Candidate $candidate)
    {
        $candidate->delete();
        Storage::delete('public/candidate_images/' . $candidate->image);
        return redirect()->back()->with('success',  'A candidate has been deleted successfully');
    }
}
