<?php

class SessionsController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        if (Auth::check()) {
            return Redirect::intended('user');
        } else {
            return View::make('sessions.index');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {

        // validate

        $input = Input::all();
        $attempt = Auth::attempt([
                    'email' => $input['email'],
                    'password' => $input['password']
        ]);

        if ($attempt) {			
            return Redirect::intended('/user');
        } else {
            // dd('problem');
            return View::make('sessions.uplogin');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy() {
        Auth::logout();
		Session::flush();
        return Redirect::intended('/login');
        
    }

}
