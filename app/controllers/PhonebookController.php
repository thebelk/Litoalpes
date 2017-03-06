<?php

class PhonebookController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
		
		if(isset($_GET['buscar'])){
				$buscar = Input::get('buscar');
				$phonebook = Phonebook::whereRaw('users_id = '. Auth::user()->id .' and (nombre LIKE "%'.$buscar.'%" or celular LIKE "%'
				.$buscar.'%" or nit LIKE "%'.$buscar.'%" or telefono LIKE "%'.$buscar.'%" or email LIKE "%'
				.$buscar.'%" or empresa LIKE "%'.$buscar.'%" )')->get();
			}else{
				$phonebook = DB::table('phonebooks')->where('users_id', '=', Auth::user()->id)->get();
			}
        
        return View::make('phonebook.index')->with('phonebook', $phonebook);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('phonebook.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
// validate
        $post_data = Input::all();
        $rules = array(
            'nombre'=> 'required',
            'empresa'=> '',
            'nit'=> '',
            'tipo_actividad'=> '',
            'descripcion_actividad'=> '',
            'email'=> '',
            'celular'=> '',
            'telefono'=> '',
            'direccion'=> '',
            'ciudad'=> '',
            'pais'=> '',
            'tipo_contacto'=> ''
        );
        $validate = Validator::make($post_data, $rules);
        if ($validate) {
            $post_data['users_id'] = Auth::user()->id;
            Phonebook::create($post_data);

            return Redirect::route('phonebook.index')
                            ->with('flash', 'The new phonebook has been created');
        }
        return Redirect::route('phonebook.create')
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
        // get the phonebook
        $phonebook = Phonebook::find($id);
        // show the edit form and pass the phonebook
        return View::make('phonebook.edit')->with('phonebook', $phonebook);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $phonebook = Input::all();
        $rules = array(
            'nombre'=> 'required',
            'empresa'=> '',
            'nit'=> '',
            'tipo_actividad'=> '',
            'descripcion_actividad'=> '',
            'email'=> '',
            'celular'=> '',
            'telefono'=> '',
            'direccion'=> '',
            'ciudad'=> '',
            'pais'=> '',
            'tipo_contacto'=> ''
            
        );
        $validate = Validator::make($phonebook, $rules);
        if ($validate) {
            $phonebook2 = Phonebook::find($phonebook['id']);
            $phonebook2->nombre= $phonebook['nombre'];
            $phonebook2->empresa= $phonebook['empresa'];
            $phonebook2->nit= $phonebook['nit'];
            $phonebook2->tipo_actividad= $phonebook['tipo_actividad'];
            $phonebook2->descripcion_actividad= $phonebook['descripcion_actividad'];
            $phonebook2->email= $phonebook['email'];
            $phonebook2->celular= $phonebook['celular'];
            $phonebook2->telefono= $phonebook['telefono'];
            $phonebook2->direccion= $phonebook['direccion'];
            $phonebook2->ciudad= $phonebook['ciudad'];
            $phonebook2->pais= $phonebook['pais'];
            $phonebook2->tipo_contacto= $phonebook['tipo_contacto'];
            $phonebook2->save();
            Session::flash('message', 'Successfully updated phonebook!');
            return Redirect::intended('/phonebooklist');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $phonebook = Phonebook::find($id);
        $phonebook->delete();
        return Redirect::intended('/phonebooklist');
    }

}
