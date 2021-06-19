<?php

namespace App\Http\Controllers;

use App\User;
use App\Position;
use App\Vote;
use App\Candidate;
use App\Officer;
use Illuminate\Http\Request;

class ClientVoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('about');
    }
    public function index()
    {
        return view('votes.index')->with('officers', Officer::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        Vote::create($data);
        return redirect(route('votes.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $officer = Officer::findOrFail($id);
        return view('votes.show')->with('officer', $officer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tallies()
    {
        $data = [
            'officers' => Officer::all(),
            'users' => User::all(),
            'positions' => Position::all(),
            'votes' => Vote::all(),
            'candidates' => Candidate::all(),
        ];

        return view('votes.tallies')->with($data);
    }

    public function about()
    {
        return view('about');
    }
}
