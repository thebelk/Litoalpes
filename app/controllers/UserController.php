<?php

class UserController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return View::make('user.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('user.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $post_data = Input::all();
        $rules = [
            'nit_cc' => 'required', 
            'razon_social' => 'required',
            'representante' => 'required',
            'otro' => 'required',
            'direccion' => 'required',
            'barrio' => 'required',
            'ciudad' => 'required',
            'pais' => 'required',
            'telefono' => 'required',
            'celular' => 'required',
            'email' => 'required|email|unique:users,email',
            'confiremail' => 'required',
            'password' => 'required',
            'confirpassword' => 'required'
        ];
        $validate = Validator::make($post_data, $rules);
        if ($validate) {
            Mail::send('emails.welcome', $data = array('post_data' => $post_data), function($message) {
                $data = Input::all();
                $data['password'] = Hash::make($data['password']);
                User::create($data);
                $message->to($data['email'], $data['name'])->subject('Welcome to nombre programa!');
            });
            return Redirect::intended('/login');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        if ($user == null) {
            $message = 'El usuario no existe.';
            return View::make('users.profile', compact('message'));
        } else if ($user->id == Auth::user()->id) {
            return View::make('users.profile');
        } else {
            return View::make('users.publicprofile', compact('user'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $user = User::find($id);
        return View::make('users.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $user = Input::all();
        $rules = [
            'nit_cc' => 'required',
            'razon_social' => 'required',
            'representante' => 'required',
            'otro' => 'required',
            'direccion' => 'required',
            'barrio' => 'required',
            'ciudad' => 'required',
            'pais' => 'required',
            'telefono' => 'required',
            'celular' => 'required',
            'email' => 'required|email|unique:users,email',
            'confiremail' => 'required',
            'password' => 'required',
            'confirpassword' => 'required'
        ];
        $validate = Validator::make($post_data, $rules);
        if ($validate) {
            $user2 = User::find($user['id']);
            $user2->nit_cc = $user['nit_cc'];
            $user2->razon_social = $user['razon_social'];
            $user2->representante = $user['representante'];
            $user2->otro = $user['otro'];
            $user2->direccion = $user['direccion'];
            $user2->barrio = $user['barrio'];
            $user2->pais = $user['pais'];
            $user2->telefono = $user['telefono'];
            $user2->email = $user['email'];
            $user2->confiremail = $user['confiremail'];
            $user2->password = $user['password'];
            $user2->confirpassword = $user['confirpassword'];
            $user2->save();
            return Redirect::intended('/profile');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        //
    }

}
