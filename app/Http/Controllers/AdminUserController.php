<?php

namespace App\Http\Controllers;

use App\Http\Requests\AdminUsers\AdminUserUpdateRequest;
use App\Http\Requests\AdminUsers\AdminUserCreateRequest;
use App\Position;
use App\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AdminUserController extends Controller
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
        return $this->middleware('checkIfHasPosition')->except('index');
    }
    public function index()
    {
        $users = User::all();
        return view('users.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create')->with('positions', Position::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminUserCreateRequest $request)
    {
        $user = new User();
        $data = $request->all();
        $data['student_no'] = $user->generateStudentNumber();
        $data['image'] = time() . '_' . $request->image->getClientOriginalName();
        $data['password'] = Hash::make($data['password']);
        $request->image->storeAs('profile_images', $data['image'], 'public');
        User::create($data);
        return redirect(route('users.index'))->with('success', 'A new user has been created');
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
    public function edit(User $user)
    {
        $positions = Position::all();
        $data = [
            'user' => $user,
            'positions' => $positions
        ];

        return view('users.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminUserUpdateRequest $request, User $user)
    {
        $data = $request->all();
        if ($request->hasFile('image')) {
            Storage::delete('public/profile_images/' . $user->image);
            $data['image'] = time() . '_' . $request->image->getClientOriginalName();
            $request->image->storeAs('profile_images', $data['image'], 'public');
        }
        $user->update($data);

        return redirect(route('users.index'))->with('success', 'A user has been updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        Storage::delete('public/profile_images/' . $user->image);
        return redirect()->back()->with('success', 'A user has been deleted successfuly');
    }
}
