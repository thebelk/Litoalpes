<?php

class QuotationController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {

        $quotation = DB::table('quotations')->where('users_id', '=', Auth::user()->id)->get();
        return View::make('quotation.index')->with('quotation',$quotation);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('quotation.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $post_data = Input::all();
        $rules = [            
            'cliente' => 'required',
            'cel_contacto' => '',
            'tipo_cliente' => '', //1.Directo   2.Servicio
            'nit_cc' => '',                        
            'empresa' => '',
            'telefono' => '',
            'direccion' => '',
            'ciudad' => '',
            'pais' => '',                        
            'email' => 'required', 
            'pagina_web' => '',
            'otro' => '',
            'clase_trabajo' => 'required',                        
            'estado_cotizacion' => 'required', // 1.espera 2.elaborada 3.enviado 4.autorizado 
            'especificaciones' => 'required',
            'cotizacion' => ''
            
            
        ];
        $validate = Validator::make($post_data, $rules);
        if ($validate) {
            $post_data['users_id'] = Auth::user()->id;
            Quotation::create($post_data);
			$this->sendmail($post_data);
            return Redirect::intended('/quotationlist')
                            ->with('flash', 'The new quotation has been created');
        }
        return Redirect::route('quotation.create')
                        ->withInput()
                        ->withErrors($post_data->errors());
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
        // get the quotation
        $quotation = Quotation::find($id);
        // show the edit form and pass the quotation
        return View::make('quotation.edit')->with('quotation', $quotation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $quotation = Input::all();
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
            'email' => 'required', 
            'pagina_web' => '',
            'otro' => '',
            'clase_trabajo' => 'required',                        
            'estado_cotizacion' => 'required', // 1.espera 2.elaborada 3.enviado 4.autorizado 
            'especificaciones' => 'required',
            'cotizacion' => ''
        );
        $validate = Validator::make($quotation, $rules);
        if ($validate) {
            $quotation2 = Quotation::find($quotation['id']);
            $quotation2->cliente = $quotation['cliente'];
            $quotation2->cel_contacto=$quotation['cel_contacto'];
            $quotation2->tipo_cliente=$quotation['tipo_cliente']; //1.Directo   2.Servicio
            $quotation2->nit_cc=$quotation['nit_cc'];                        
            $quotation2->empresa=$quotation['empresa'];
            $quotation2->telefono=$quotation['telefono'];
            $quotation2->direccion=$quotation['direccion'];
            $quotation2->ciudad=$quotation['ciudad'];
            $quotation2->pais=$quotation['pais'];                        
            $quotation2->email=$quotation['email'];
            $quotation2->pagina_web=$quotation['pagina_web'];
            $quotation2->otro=$quotation['otro'];
            $quotation2->clase_trabajo=$quotation['clase_trabajo'];                        
            $quotation2->estado_cotizacion=$quotation['estado_cotizacion']; // 1.espera 2.elaborada 3.enviado 4.autorizado 
            $quotation2->especificaciones=$quotation['especificaciones'];
            $quotation2->cotizacion=$quotation['cotizacion']; 
            $quotation2->save();
			$this->sendmail($quotation);
            return Redirect::intended('/quotationlist');
            
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {  
         $quotation = Quotation::find($id);       
        $quotation->delete();
        return Redirect::intended('/quotationlist');
    }

    public function sendmail($data) {		
    	/*
		$config = array(
    			'driver' => $mail->driver,
    			'host' => $mail->host,
    			'port' => $mail->port,
    			'from' => array('address' => $mail->from_address, 'name' => $mail->from_name),
    			'encryption' => $mail->encryption,
    			'username' => $mail->username,
    			'password' => $mail->password,
    			'sendmail' => '/usr/sbin/sendmail -bs',
    			'pretend' => false
    	);
    	Config::set('mail',$config);
		*/
    	 
    	Mail::send('emails.welcome', $data, function($message) use ($data)
    	 {
    	 $message
    	 ->to($data['email'], $data['cliente'])
    	 ->subject('Litografía Los Alpes - Cotización');
    	});    	
    	return true;
    }
}
