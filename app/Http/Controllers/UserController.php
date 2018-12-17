<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Biodata;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.user_show', ['users'=>$users]);
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
        $user = User::create($request->all());
        $user->password = bcrypt($request->password);
        $user->photo = $request->username.'.jpg';
        $user->save();

        $request->merge(["user_id" => $user->id]);
        $biodata = Biodata::create($request->all());
        $biodata->save();

        // $biodata = Biodata::create($request->all());
        // $biodata->user_id = $user->id;
        // $biodata->save();

        // Biodata::create([
        //     'phone' => $request->phone,
        //     'gender' => $request->gender,
        //     'website' => $request->website,
        //     'date_of_birth' => $request->date_of_birth,
        //     'place_of_birth' => $request->place_of_birth,
        //     'user_id' => $user->id,
        // ]);

        $path = $request->file('photo')->storeAs('images',request('username').'.jpg');

        return redirect()->route('user_show');
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
        $user = User::findOrFail($id);
        $user->update($request->all());

        return redirect()->route('user_show');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('user_show');
    }
}
