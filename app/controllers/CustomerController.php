<?php

class CustomerController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        // return 'vista de Custor.index'; 
        return View::make('customer.index');
        // get all the customer        
        /* $customer = Customer::where('users_id', '=', Auth::user()->id)->get()->toJson();
          return $customer; */
        $customer = DB::table('customers')->where('users_id', '=', Auth::user()->id)->get();
        // return View::make('customers.customerlist')->with('customer', $customer);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
// validate
// read more on validation 
        $rules = array(
            'nit_cc' => 'required',
            'cliente' => 'required',
            'representante' => 'required',
            'dependencia' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'pais' => 'required',
            'telefono' => 'required',
            'celular' => 'required',
            'email' => 'required|email'
        );
        $customer = Validator::make(Input::all(), $rules);
        if ($customer) {
            $customer['users_id'] = Auth::user()->id;
            $customer['status'] = true;
            Vehicle::create($customer);
            Session::flash('message', 'Successfully created customer!');
            $customer->save();
            return Redirect::intended('/customerlist');
            //return json_encode($customer);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {

        $customer = Customer::find($id);
         if ($customer == null) {
            $message = 'Usuario no registrado.';
            return View::make('customer.show', compact('message'));
        } else if ($customer->id == Auth::customer()->id) {
            return View::make('customer.show');
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
        // get the customer
        $customer = Customer::find($id);  //->toJson();        
        // show the edit form and pass the customer
        return View::make('customer.edit')->with('customer', $customer);
        // return $customer;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $rules = array(
            'nit_cc' => 'required',
            'cliente' => 'required',
            'representante' => 'required',
            'dependencia' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'pais' => 'required',
            'telefono' => 'required',
            'celular' => 'required',
            'email' => 'required|email'
        );
        $customer = Validator::make(Input::all(), $rules);
        if ($validate) {
            $customer2 = Customer::find($customer['id']);
            $customer2->nit_cc = $customer['nit_cc'];
            $customer2->cliente = $customer['cliente'];
            $customer2->representante = $customer['representante'];
            $customer2->dependencia = $customer['dependencia'];
            $customer2->direccion = $customer['direccion'];
            $customer2->ciudad = $customer['ciudad'];
            $customer2->pais = $customer['pais'];
            $customer2->telefono = $customer['telefono'];
            $customer2->celular = $customer['celular'];
            $customer2->email = $customer['email'];
            $customer2->save();
            Session::flash('message', 'Successfully updated customer!');
            return Redirect::intended('/customerlist');
            //return json_encode($customer);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $datos = Input::all();
        $customer = Customer::find($datos['id']);
        $customer->delete();
        Session::flash('message', 'Successfully deleted the customer!');
        return Redirect::intended('/customerlist');
    }

}
