<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPartylist\AdminPartylistCreateRequest;
use App\Partylist;
use Illuminate\Http\Request;

class PartylistController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('checkIfIsAdmin');
    }

    public function index()
    {
        return view('partylists.index')->with('partylists', Partylist::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('partylists.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminPartylistCreateRequest $request)
    {
        Partylist::create($request->all());
        return redirect(route('partylists.index'))->with('success', 'A new partylist has been created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Partylist $partylist)
    {
        return view('partylists.show')->with('partylist', $partylist);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Partylist $partylist)
    {
        return view('partylists.edit')->with('partylist', $partylist);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminPartylistCreateRequest $request, Partylist $partylist)
    {
        $partylist->update($request->all());
        return redirect(route('partylists.index'))->with('success', 'A partylist has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Partylist $partylist)
    {
        if ($partylist->candidates->count() > 0) {
            session()->flash('error', 'You cannot delete partylist because of associated candidate');
        } else {
            $partylist->delete();
            session()->flash('success', 'A partylist has been deleted successfully');
        }
        return redirect()->back();
    }
}
