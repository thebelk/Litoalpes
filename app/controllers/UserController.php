<?php

class UserController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {    
        $workorder =Workorder::whereRaw('estado_trabajo = 1')->get();
        return View::make('user.index')->with('workorder', $workorder);   
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
            'nit_cc' => 'Required|Numeric',
            'razon_social' => '',
            'direccion' => '',
            'ciudad' => '',
            'pais' => '',
            'telefono' => '',
            'celular' => 'Required|Numeric',
            'representante' => 'Required',
            'email' => 'Required|Confirmed|Email|Unique:users,email',
            'email_confirmation' => 'Required|Email',
            'password' => 'Required|Confirmed',
            'password_confirmation' => 'Required'
        ];
        $validate = Validator::make($post_data, $rules);
        if ($validate->passes()) {
            $post_data['password'] = Hash::make($post_data['password']);
            $post_data['password_confirmation'] = Hash::make($post_data['password_confirmation']);
            User::create($post_data);
            return Redirect::intended('/login');
        } else {
            return View::make('user.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {



        $customer = Customer::all();
        $workorder = Workorder::all();
        return View::make('user.income')->with('workorder', $workorder, 'customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $user = User::find($id);
        return View::make('user.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $user = Input::all();
        if ($user['save'] == 'savepassword') {
            $rules = [
                'password' => 'Required|Confirmed',
                'password_confirmation' => 'Required'
            ];
            $validate = Validator::make($user, $rules);
            if ($validate->passes()) {
                $user2 = User::find($user['id']);
                if (Hash::check($user['old_password'], $user2['password'])) {
                    $user2['password'] = Hash::make($user['password']);
                    $user2['password_confirmation'] = Hash::make($user['password_confirmation']);
                    $user2->save();
                    return Redirect::intended('/user');
                }
            }
            return Redirect::intended('/user/' . $user['id'] . '/edit');
        } else {
            $rules = [
                'nit_cc' => 'required',
                'razon_social' => 'required',
                'direccion' => '',
                'ciudad' => '',
                'pais' => '',
                'telefono' => '',
                'celular' => 'required',
                'representante' => 'required',
                'email' => 'Required|Confirmed|Email',
                'email_confirmation' => 'Required|Email'
            ];
            $validate = Validator::make($user, $rules);
            if ($validate->passes()) {
                $user2 = User::find($user['id']);
                $user2->nit_cc = $user['nit_cc'];
                $user2->razon_social = $user['razon_social'];
                $user2->direccion = $user['direccion'];
                $user2->pais = $user['pais'];
                $user2->telefono = $user['telefono'];
                $user2->celular = $user['celular'];
                $user2->save();
                return Redirect::intended('/user');
            }
            return Redirect::intended('/user/' . $user['id'] . '/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        Auth::logout();
        return View::make('sessions.index');
    }

}
