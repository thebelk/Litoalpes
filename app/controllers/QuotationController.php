<?php

class QuotationController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
		if(isset($_GET['buscar'])){
				$buscar = Input::get('buscar');
				$quotation = Quotation::whereRaw('users_id = '. Auth::user()->id .' and (cliente LIKE "%'.$buscar.'%" or cel_contacto LIKE "%'
				.$buscar.'%" or nit_cc LIKE "%'.$buscar.'%" or telefono LIKE "%'.$buscar.'%" or clase_trabajo LIKE "%'.$buscar.'%" or email LIKE "%'
				.$buscar.'%" or empresa LIKE "%'.$buscar.'%" )')->get();
			}else{
				$quotation = DB::table('quotations')->where('users_id', '=', Auth::user()->id)->get();
			}
        
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
			try
			{
				if (isset($_POST['enviar'])) {
					$post_data['estado_cotizacion']='2'; // 1.espera 2.elaborada 3.enviado 4.autorizado 
					$this->sendmail($post_data);
				}
			}
			catch (Exception $e)
			{
				$post_data['estado_cotizacion']='1'; // 1.espera 2.elaborada 3.enviado 4.autorizado 
			}
			Quotation::create($post_data);
            return Redirect::intended('/quotationlist')
                            ->with('message', ' La nueva cotización ha sido creada');
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
			Log::info('Previo a try/catch.');
			try
			{
				Log::info('Entro try/catch.');
				if (isset($quotation['enviar'])) {
					$quotation2->estado_cotizacion = '2';//1.espera 2.elaborada 3.enviado 4.autorizado
					Log::info('Cambio estado.');
					$this->sendmail($quotation);
					Log::info('Envio Correo Ok.');
				}
				Log::info('Salio IF try/catch.');
			}
			catch (Exception $e)
			{
				$quotation2->estado_cotizacion = $quotation['estado_cotizacion']; // 1.espera 2.elaborada 3.enviado 4.autorizado 
				Log::info('Excepcion' . $e);
			}
			$quotation2->save();
            return Redirect::intended('/quotationlist')
					->with('message', 'Cotización actualizada con éxito');
            
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
	
	public function configmail() {
		$data = Input::all();
		$encryption = '';
		$host = '';
		$port = 0;
		if ((strpos($data['email'], 'hotmail') !== false)
		 or (strpos($data['email'], 'outlook') !== false)) {
			$host = 'smtp-mail.outlook.com';
			$port = 587;
			$encryption = 'tls';
			Log::info('Configuro Hotmail Ok');
		}
		else{
			if (strpos($data['email'], 'gmail') !== false) {
				$host = 'smtp.gmail.com';
				$port = 465;
				$encryption = 'ssl';
				Log::info('Configuro Gmail Ok');
			}
			else{
				if (strpos($data['email'], 'yahoo') !== false) {
					$host = 'smtp.mail.yahoo.com';
					$port = 465;
					$encryption = 'ssl';
					Log::info('Configuro Yahoo Ok');
				}
			}			
		}
		/*
		$config = array(
    			'mail.driver' => 'smtp',
    			'mail.host' => $host,
    			'mail.port' => $port,
    			'mail.from' => array('address' => $data['email'], 'name' => Auth::user()->razon_social),
    			'mail.encryption' => $encryption,
    			'mail.username' => $data['email'],
    			'mail.password' => $data['clave_correo'],
    			'mail.sendmail' => '/usr/sbin/sendmail -bs',
    			'mail.pretend' => false
    	);
		*/
		Config::write(['mail.driver','mail.host','mail.port','mail.encryption',
						'mail.username','mail.password','mail.sendmail','mail.pretend'],
						['smtp',$host,$port,$encryption,$data['email'],$data['clave_correo'],'/usr/sbin/sendmail -bs',false]);
						
		$array = Config::get('mail');
		$array['from']['address'] = $data['email'];
		$array['from']['name'] = Auth::user()->razon_social;
		$data = var_export($array, 1);
		File::put(app_path() . '/config/mail.php', "<?php\n return $data;");
		return Redirect::intended('/quotationlist')
                            ->with('flash', 'The new quotation has been created');
	}

    public function sendmail($data) {		
    	Mail::send('emails.welcome', $data, function($message) use ($data)
    	 {
    	 $message
    	 ->to($data['email'], $data['cliente'])
    	 ->subject('LitoApp - ' . Auth::user()->razon_social . ' - Cotización');
    	});
		/*
		// setting the username and password from post data
		//$username = 'jotallamas@gmail.com';
		//$password = 'felaj023';
		$body = View::make('emails.welcome')->with('data', $data);
		$subject = 'LitoApp - ' . Auth::user()->razon_social . ' - Cotización';
		
		// setting the server, port and encryption
		$transport = Swift_SmtpTransport::newInstance('smtp.gmail.com', 465, 'ssl')
		  ->setUsername('jotallamas@gmail.com')
		  ->setPassword('felaj023');
		
		// creating the Swift_Mailer instance and pass the config settings
		$mailer = Swift_Mailer::newInstance($transport);
		
		// configuring the Swift mail instance with all details
		$message = Swift_Message::newInstance($subject)
		  ->setFrom(array($username => Auth::user()->razon_social))
		  ->setTo(array($data['email'] => $data['cliente']))
		  ->setBody($body, 'text/html');
		  
		try
		{
		  $mailer->send($message);
		  echo 'Mail sent... Enoy.';
		}
		catch (Exception $e)
		{
		  die('Error sending email. ' . $e);
		}
		*/
    	return true;
    }
}
