<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminPosition\AdminPositionCreateRequest;
use App\Position;
use Illuminate\Http\Request;

class AdminPositionController extends Controller
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
    }

    public function index()
    {
        return view('positions.index')->with('positions', Position::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('positions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminPositionCreateRequest $request)
    {
        Position::create($request->all());
        return redirect(route('positions.index'))->with('success', 'A new user role has been created');
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
    public function edit(Position $position)
    {
        return view('positions.edit')->with('position', $position);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminPositionCreateRequest $request, Position $position)
    {
        $position->update($request->all());
        return redirect(route('positions.index'))->with('success', 'A user role has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Position $position)
    {
        if ($position->users->count() > 0) {
            session()->flash('error', 'You cannot delete this role because of associated user');
        } else {
            $position->delete();
            session()->flash('success', 'A user role has been deleted successfully');
        }
        return redirect()->back();
    }
}
