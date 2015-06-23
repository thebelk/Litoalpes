<?php

class PhonebookController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        // return 'vista de phonebook.index'; 
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
// read more on validation 
        $rules = array(
            'nombre' => 'required',
            'ocupacion' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'pais' => 'required',
            'telefono' => 'required',
            'celular' => 'required',
            'email' => 'required',
            'empresa' => 'required'
        );
        $phonebook = Validator::make(Input::all(), $rules);
        if ($phonebook) {
            $phonebook['users_id'] = Auth::user()->id;
            $phonebook['status'] = true;
            Vehicle::create($phonebook);
            Session::flash('message', 'Successfully created phonebook!');
            $phonebook->save();
            return Redirect::intended('/phonebooklist');
            //return json_encode($phonebook);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {

        $phonebook = Phonebook::find($id); //->toJson();
        return View::make('phonebook.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        // get the phonebook
        $phonebook = Phonebook::find($id);  //->toJson();        
        // show the edit form and pass the phonebook
        return View::make('phonebook.edit')->with('phonebook', $phonebook);
        // return $phonebook;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $rules = array(
            'nombre' => 'required',
            'ocupacion' => 'required',
            'direccion' => 'required',
            'ciudad' => 'required',
            'pais' => 'required',
            'telefono' => 'required',
            'celular' => 'required',
            'email' => 'required',
            'empresa' => 'required'
        );
        $phonebook = Validator::make(Input::all(), $rules);
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
            //return json_encode($phonebook);
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
        Session::flash('message', 'Successfully deleted the phonebook!');
        return Redirect::intended('/phonebooklist');
    }

}
