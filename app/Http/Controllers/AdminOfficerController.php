<?php

namespace App\Http\Controllers;

use App\Officer;
use App\Http\Requests\AdminOfficers\AdminOfficerCreateRequest;
use App\Http\Resources\AdminOfficers\AdminOfficerCreateRequest as AdminOfficersAdminOfficerCreateRequest;
use Illuminate\Http\Request;

class AdminOfficerController extends Controller
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
        return view('officers.index')->with('officers', Officer::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('officers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminOfficerCreateRequest $request)
    {
        Officer::create($request->all());
        return redirect(route('officers.index'))->with('success', 'A new officer has been created');
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
    public function edit(Officer $officer)
    {
        return view('officers.edit')->with('officer', $officer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminOfficerCreateRequest $request, Officer $officer)
    {
        $officer->update($request->all());
        return redirect(route('officers.index'))->with('success', 'A candidate officer has been updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Officer $officer)
    {
        if ($officer->candidates->count() > 0) {
            session()->flash('error', 'You cannot delete officer because of associated candidate');
        } else {
            $officer->delete();
            session()->flash('success', 'A candidate officer has been deleted successfully');
        }
        return redirect()->back();
    }
}
