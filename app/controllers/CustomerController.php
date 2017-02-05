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
        $rules= array(
            'cliente' => 'required',
            'cel_contacto' => '',
            'tipo_cliente' => '', //1.Directo   2.Servicio
            'nit_cc' => '',
            'empresa' => '',
            'telefono' => '',
            'direccion' => '',
            'ciudad' => '',
            'pais' => '',
            'email' => '',
            'pagina_web' => '',
            'otro' => ''
        );

        $validate = Validator::make($post_data, $rules);
        if ($validate) {
            $post_data['users_id'] = Auth::user()->id;
            $customer = Customer::create($post_data);
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
            'cliente' => 'required',
            'cel_contacto' => '',
            'tipo_cliente' => '', //1.Directo   2.Servicio
            'nit_cc' => '',
            'empresa' => '',
            'telefono' => '',
            'direccion' => '',
            'ciudad' => '',
            'pais' => '',
            'email' => '',
            'pagina_web' => '',
            'otro' => ''
        );
        $validate = Validator::make($customer, $rules);
        if ($validate) {
            $customer2 = Customer::find($customer['id']);
            $customer2->cliente = $customer['cliente'];
            $customer2->cel_contacto = $customer['cel_contacto'];
            $customer2->tipo_cliente = $customer['tipo_cliente']; //1.Directo   2.Servicio
            $customer2->nit_cc = $customer['nit_cc'];
            $customer2->empresa = $customer['empresa'];
            $customer2->telefono = $customer['telefono'];
            $customer2->direccion = $customer['direccion'];
            $customer2->ciudad = $customer['ciudad'];
            $customer2->pais = $customer['pais'];
            $customer2->email = $customer['email'];
            $customer2->pagina_web = $customer['pagina_web'];
            $customer2->otro = $customer['otro'];
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
	
	public function search() {
        
		//
		$data = Input::all();
		$customer = DB::table('customers')
			->where('users_id', '=', Auth::user()->id)
			->where('nit_cc', 'LIKE', '%' . $data['nit_cc'] . '%')
			->get();
		if(!empty($customer)){
			if(count($customer) == 1){
				$cust = reset($customer);
				return Redirect::intended('customer/' . $cust->id . '/workorder/create');
			}
			return View::make('customer.search')->with('customer', $customer);
		}
        return Redirect::intended('customer/create');
		
    }
	

}
