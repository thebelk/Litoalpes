<?php

class PhonebookController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return View::make('phonebook.index');
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
        $rules = [
            'nombre' => 'required',
            'ocupacion' => 'required',
            'direccion' => '',
            'ciudad' => '',
            'barrio' => '',
            'telefono' => 'required',
            'celular' => '',
            'email' => '',
            'empresa' => 'required'
        ];
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
            'nombre' => 'required',
            'ocupacion' => 'required',
            'direccion' => '',
            'ciudad' => '',
            'barrio' => '',
            'telefono' => 'required',
            'celular' => '',
            'email' => '',
            'empresa' => 'required'
        );
        $validate = Validator::make($phonebook, $rules);
        if ($validate) {
            $phonebook2 = Phonebook::find($phonebook['id']);
            $phonebook2->nombre = $phonebook['nombre'];
            $phonebook2->ocupacion = $phonebook['ocupacion'];
            $phonebook2->direccion = $phonebook['direccion'];
            $phonebook2->ciudad = $phonebook['ciudad'];
            $phonebook2->pais = $phonebook['pais'];
            $phonebook2->telefono = $phonebook['telefono'];
            $phonebook2->celular = $phonebook['celular'];
            $phonebook2->email = $phonebook['email'];
            $phonebook2->empresa = $phonebook['empresa'];
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
        $datos = Input::all();
        $phonebook = Phonebook::find($datos['id']);
        $phonebook->delete();
        return Redirect::intended('/phonebooklist');
    }

}
