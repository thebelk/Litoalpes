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
            'estado_cotizacion' => 'required',
            'nombre_cliente' => 'required',
            'clase_trabajo' => 'required',
            'especificaciones' => 'required',
            'cotizacion' => '',
            'direccion' => 'required',
            'barrio' => 'required',
            'telefono' => 'required',
            'celular' => '',
            'email' => ''
        ];
        $validate = Validator::make($post_data, $rules);
        if ($validate) {
            $post_data['users_id'] = Auth::user()->id;
            Quotation::create($post_data);            
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
            'estado_cotizacion' => 'required',
            'nombre_cliente' => 'required',
            'clase_trabajo' => 'required',
            'especificaciones' => 'required',
            'cotizacion' => '',
            'direccion' => 'required',
            'barrio' => 'required',
            'telefono' => 'required',
            'celular' => '',
            'email' => ''
        );
        $validate = Validator::make($quotation, $rules);
        if ($validate) {
            $quotation2 = User::find($quotation['id']);
            $quotation2->estado_cotizacion = $quotation['estado_cotizacion'];
            $quotation2->nombre_cliente = $quotation['nombre_cliente'];
            $quotation2->clase_trabajo = $quotation['clase_trabajo'];
            $quotation2->especificaciones = $quotation['especificaciones'];
            $quotation2->cotizacion = $quotation['cotizacion'];
            $quotation2->direccion = $quotation['direccion'];
            $quotation2->barrio = $quotation['barrio'];
            $quotation2->telefono = $quotation['telefono'];
            $quotation2->celular = $quotation['celular'];
            $quotation2->email = $quotation['email'];
            $quotation2->save();
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
        $datos = Input::all();
        $quotation = Quotation::find($datos['id']);
        $quotation->delete();
        return Redirect::intended('/quotationlist');
    }

}
