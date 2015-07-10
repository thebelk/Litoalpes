<?php

class WorkorderController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        return View::make('workorder.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('workorder.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $post_data = Input::all();
        $rules = [
            'no_orden' => '',
            'clase_trabajo' => 'required',
            'valor_trabajo' => 'required',
            'iva' => 'required',
            'iva2' => 'required',
            'total' => 'required',
            'abono' => 'required',
            'saldo' => 'required',
            'pago' => '',
            'cantidad' => '',
            'tamano' => '',
            'fecha_entrega' => '',
            'estado_trabajo' => '',
            'tipo_elaborado' => '',
            'diseño' => '',
            'diseñador' => '',
            'habilitado_dian' => '',
            'fecha_dian' => '',
            'cantidad_material' => '',
            'tipo_material' => '',
            'atendido' => '',
            'emblocado' => '',
            'no_tintas' => '',
            'tipo_color' => '',
            'color1' => '',
            'color2' => '',
            'color3' => '',
            'no_copia' => '',
            'copia1' => '',
            'copia1' => '',
            'copia3' => '',
            'copia4' => '',
            'no_inicial' => '',
            'no_final' => '',
            'original_todas' => '',
            'numerado' => '',
            'tiro_retiro' => '',
            'levante' => '',
            'perforado' => '',
            'quemado' => '',
            'acabados' => '',
            'no_master' => '',
            'no_plancha' => '',
            'engomado' => '',
            'engrapado' => '',
            'observaciones' => '',
            'maquina' => '',
            'deetalles' => '',
            'nombre_registro_pedido' => ''
        ];
        $validate = Validator::make($post_data, $rules);
        if ($validate) {
            $post_data['customer_id'] = Auth::customer_id()->id;
            Workorder::create($post_data);
            return Redirect::intended('/customer/profile')
                            ->with('flash', 'The new customer has been created');
        }
        return Redirect::route('workorder.create')
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
        // get the workorder
        $workorder = Workorder::find($id);
        // show the edit form and pass the workorder
        return View::make('workorder.edit')->with('workorder', $workorder);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $workorder = Input::all();
        $rules = [
            'no_orden' => '',
            'clase_trabajo' => 'required',
            'valor_trabajo' => 'required',
            'iva' => 'required',
            'iva2' => 'required',
            'total' => 'required',
            'abono' => 'required',
            'saldo' => 'required',
            'pago' => '',
            'cantidad' => '',
            'tamano' => '',
            'fecha_entrega' => '',
            'estado_trabajo' => '',
            'tipo_elaborado' => '',
            'diseño' => '',
            'diseñador' => '',
            'habilitado_dian' => '',
            'fecha_dian' => '',
            'cantidad_material' => '',
            'tipo_material' => '',
            'atendido' => '',
            'emblocado' => '',
            'no_tintas' => '',
            'tipo_color' => '',
            'color1' => '',
            'color2' => '',
            'color3' => '',
            'no_copia' => '',
            'copia1' => '',
            'copia1' => '',
            'copia3' => '',
            'copia4' => '',
            'no_inicial' => '',
            'no_final' => '',
            'original_todas' => '',
            'numerado' => '',
            'tiro_retiro' => '',
            'levante' => '',
            'perforado' => '',
            'quemado' => '',
            'acabados' => '',
            'no_master' => '',
            'no_plancha' => '',
            'engomado' => '',
            'engrapado' => '',
            'observaciones' => '',
            'maquina' => '',
            'deetalles' => '',
            'nombre_registro_pedido' => ''
        ];
        $validate = Validator::make($workorder, $rules);
        if ($validate) {
            $workorder2 = User::find($workorder['id']);
            $workorder2->no_orden = $workorder['no_orden'];
            $workorder2->clase_trabajo = $workorder['clase_trabajo'];
            $workorder2->valor_trabajo = $workorder['valor_trabajo'];
            $workorder2->iva = $workorder['iva'];
            $workorder2->iva2 = $workorder['iva2'];
            $workorder2->total = $workorder['total'];
            $workorder2->abono = $workorder['abono'];
            $workorder2->saldo = $workorder['saldo'];
            $workorder2->pago = $workorder['pago'];
            $workorder2->cantidad = $workorder['cantidad'];
            $workorder2->tamano = $workorder['tamano'];      
            $workorder2->fecha_entrega = $workorder['fecha_entrega'];
            $workorder2->estado_trabajo = $workorder['estado_trabajo'];
            $workorder2->tipo_elaborado = $workorder['tipo_elaborado'];
            $workorder2->diseño = $workorder['diseño'];
            $workorder2->diseñador = $workorder['diseñador'];
            $workorder2->habilitado_dian = $workorder['habilitado_dian'];
            $workorder2->fecha_dian = $workorder['fecha_dian'];
            $workorder2->cantidad_material = $workorder['cantidad_material'];
            $workorder2->tipo_material = $workorder['tipo_material'];
            $workorder2->atendido = $workorder['atendido'];
            $workorder2->emblocado = $workorder['emblocado'];            $
            $workorder2->no_tintas = $workorder['no_tintas'];
            $workorder2->tipo_color = $workorder['tipo_color'];
            $workorder2->color1 = $workorder['color1'];
            $workorder2->color2 = $workorder['color2'];
            $workorder2->color3 = $workorder['color3'];
            $workorder2->no_copia = $workorder['no_copia'];
            $workorder2->copia1 = $workorder['copia1'];
            $workorder2->copia2 = $workorder['copia2'];
            $workorder2->copia3 = $workorder['copia3'];
            $workorder2->copia4 = $workorder['copia4'];
            $workorder2->no_inicial = $workorder['no_inicial'];           
            $workorder2->no_final = $workorder['no_final'];
            $workorder2->original_todas = $workorder['original_todas'];
            $workorder2->numerado = $workorder['numerado'];
            $workorder2->tiro_retiro = $workorder['tiro_retiro'];
            $workorder2->levante = $workorder['levante'];
            $workorder2->perforado = $workorder['perforado'];
            $workorder2->quemado = $workorder['quemado'];
            $workorder2->acabados = $workorder['acabados'];
            $workorder2->no_master = $workorder['no_master'];
            $workorder2->no_plancha = $workorder['no_plancha'];
            $workorder2->engomado = $workorder['engomado'];         
            $workorder2->engrapado = $workorder['engrapado'];
            $workorder2->observaciones = $workorder['observaciones'];
            $workorder2->maquina = $workorder['maquina'];
            $workorder2->deetalles = $workorder['deetalles'];
            $workorder2->nombre_registro_pedido = $workorder['nombre_registro_pedido'];            
            $workorder2->save();
            return Redirect::intended('/customer/profile');
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
        $workorder = Workorder::find($datos['id']);
        $workorder->delete();
        return Redirect::intended('/customer/profile');
    }

}
