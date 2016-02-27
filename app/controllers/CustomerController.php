<?php

class CustomerController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $customer = DB::table('customers')->where('users_id', '=', Auth::user()->id)->get();
        return View::make('customer.index')->with('customer', $customer);
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
        $post_data = Input::all();
        $rules = [
            'nit_cc' => '',
            'cliente' => 'required',
            'empresa' => '',
            'tipo_cliente' => 'required',
            'direccion' => '',
            'pagina_web' => '',
            'ciudad' => '',
            'pais' => '',
            'telefono' => '',
            'contacto' => '',
            'otro' => 'required',
            'email' => ''
        ];

        $validate = Validator::make($post_data, $rules);
        if ($validate) {
            $post_data['users_id'] = Auth::user()->id;
          $customer   = Customer::create($post_data);
            return View::make('workorder.create')->with('customer', $customer);
                            
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
        $workorder = DB::table('workorders')->where('customers_id', '=', $customer['id'])->get();
        return View::make('customer.show', compact('customer'))->with('workorder', $workorder);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // get the customer
        $customer = Customer::find($id);
        // show the edit form and pass the customer
        return View::make('customer.edit')->with('customer', $customer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $customer = Input::all();
        $rules = array(
           'nit_cc' => '',
            'cliente' => 'required',
            'empresa' => '',
            'tipo_cliente' => 'required',
            'direccion' => '',
            'pagina_web' => '',
            'ciudad' => '',
            'pais' => '',
            'telefono' => '',
            'contacto' => '',
            'otro' => 'required',
            'email' => ''
        );
        $validate = Validator::make($customer, $rules);
        if ($validate) {
            $customer2 = Customer::find($customer['id']);
            $customer2->nit_cc = $customer['nit_cc'];
            $customer2->cliente = $customer['cliente'];
            $customer2->empresa = $customer['empresa'];
            $customer2->tipo_cliente = $customer['tipo_cliente'];
            $customer2->direccion = $customer['direccion'];
            $customer2->pagina_web = $customer['pagina_web'];
            $customer2->ciudad = $customer['ciudad'];
            $customer2->pais = $customer['pais'];
            $customer2->telefono = $customer['telefono'];
            $customer2->contacto = $customer['contacto'];
            $customer2->otro = $customer['otro'];
            $customer2->email = $customer['email'];
            $customer2->save();
            // Session::flash('message', 'Successfully updated customer!');
          
              return Redirect::intended('customer/' . $customer['id'] . '/profile');
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
