<?php

class WorkorderController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $workorder = Workorder::all();
        return View::make('workorder.index')->with('workorder', $workorder);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create($id) {

        $customer = Customer::find($id);
        // show the edit form and pass the customer
        return View::make('workorder.create')->with('customer', $customer);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $post_data = Input::all();
        $rules = [
            'tipo_orden' => 'required',
            'no_orden' => 'required',
            'clase_trabajo' => '',
            'fecha_entrega' => 'required',
            'detalles_trabajo' => '',
            'valor_trabajo' => 'required',
            'abono' => '',
            'saldo' => '',
            'pago' => '',
            'iva' => '',
            'no_factura' => '',
            'vendedor' => 'required',
            'estado_trabajo' => '',
            'diseñador' => '',
            'tipo_realizado' => '',
            'tipo_elaborado' => '',
            'tipo_impresion' => '',
            'no_dian' => '',
            'fecha_dian' => '',
            'habilitado_dian' => '',
            'observacion_diseño' => '',
            'fecha_reporte_diseño' => '',
            'autorizado_diseño' => '',
            'maquina' => '',
            'clase_material' => '',
            'cantidad_material' => '',
            'cantidad_trabajo' => '',
            'tamano' => '',
            'corte' => '',
            'emblocado' => '',
            'no_inicial' => '',
            'no_final' => '',
            'color_tinta' => '',
            'no_tintas' => '',
            'tinta_especial' => '',
            'color_material' => '',
            'no_copia' => '',
            'copia1' => '',
            'copia2' => '',
            'copia3' => '',
            'copia4' => '',
            'original_todas' => '',
            'tiro_retiro' => '',
            'observacion_impresion' => '',
            'fechadereporte_reporte_impresion' => '',
            'autorizado_impresion' => '',
            'levante' => '',
            'perforado' => '',
            'laminado' => '',
            'corte_refile' => '',
            'engomado' => '',
            'estampado' => '',
            'argollado' => '',
            'engrapado' => '',
            'sublimacion' => '',
            'plastificadomate' => '',
            'plastificadoreserva' => '',
            'plastificadouv' => '',
            'otro_acabados' => '',
            'recomendaciones' => '',
            'observacion_acabados' => '',
            'fechadereporte_reporte_acabados' => '',
            'autorizado_acabados' => '',
            'customers_id' => ''
        ];
        $validate = Validator::make($post_data, $rules);
        $post_data['pago'] = (int) $post_data['pago'];
        //return $post_data;
        if ($validate) {
            //$customer = Customer::find($id);
            //$post_data['customers_id'] = $customer->id;
            Workorder::create($post_data);
            return Redirect::intended('customer/' . $post_data['customers_id'] . '/profile')
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
        $workorder = Workorder::find($id);
        $customer = Customer::find($workorder['customers_id']);
        return View::make('workorder.show', compact('workorder'))->with('customer', $customer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {

        $workorder = Workorder::find($id);
        $customer = Customer::find($workorder['customers_id']);
        return View::make('workorder.edit', compact('workorder'))->with('customer', $customer, 'workorder', $workorder);
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
            'tipo_orden' => 'required',
            'no_orden' => 'required',
            'clase_trabajo' => '',
            'fecha_entrega' => 'required',
            'detalles_trabajo' => '',
            'valor_trabajo' => 'required',
            'abono' => '',
            'saldo' => '',
            'pago' => '',
            'iva' => '',
            'no_factura' => '',
            'vendedor' => 'required',
            'estado_trabajo' => '',
            'diseñador' => '',
            'tipo_realizado' => '',
            'tipo_elaborado' => '',
            'tipo_impresion' => '',
            'no_dian' => '',
            'fecha_dian' => '',
            'habilitado_dian' => '',
            'observacion_diseño' => '',
            'fecha_reporte_diseño' => '',
            'autorizado_diseño' => '',
            'maquina' => '',
            'clase_material' => '',
            'cantidad_material' => '',
            'cantidad_trabajo' => '',
            'tamano' => '',
            'corte' => '',
            'emblocado' => '',
            'no_inicial' => '',
            'no_final' => '',
            'color_tinta' => '',
            'no_tintas' => '',
            'tinta_especial' => '',
            'color_material' => '',
            'no_copia' => '',
            'copia1' => '',
            'copia2' => '',
            'copia3' => '',
            'copia4' => '',
            'original_todas' => '',
            'tiro_retiro' => '',
            'observacion_impresion' => '',
            'fecha_reporte_impresion' => '',
            'autorizado_impresion' => '',
            'levante' => '',
            'perforado' => '',
            'laminado' => '',
            'corte_refile' => '',
            'engomado' => '',
            'estampado' => '',
            'argollado' => '',
            'engrapado' => '',
            'sublimacion' => '',
            'plastificadomate' => '',
            'plastificadoreserva' => '',
            'plastificadouv' => '',
            'otro_acabados' => '',
            'recomendaciones' => '',
            'observacion_acabados' => '',
            'fecha_reporte_acabados' => '',
            'autorizado_acabados' => '',
            'customers_id' => ''
        ];
        $validate = Validator::make($workorder, $rules);
        if ($validate) {
            $workorder2 = Workorder::find($workorder['id']);
            $workorder2->tipo_orden = $workorder['tipo_orden'];
            $workorder2->no_orden = $workorder['no_orden'];
            $workorder2->clase_trabajo = $workorder['clase_trabajo'];
            $workorder2->fecha_entrega = $workorder['fecha_entrega'];
            $workorder2->detalles_trabajo = $workorder['detalles_trabajo'];
            $workorder2->valor_trabajo = $workorder['valor_trabajo'];
            $workorder2->abono = $workorder['abono'];
            $workorder2->saldo = $workorder['saldo'];
            $workorder2->pago = $workorder['pago'];
            $workorder2->iva = $workorder['iva']? 1 : 0;
            $workorder2->no_factura = $workorder['no_factura'];
            $workorder2->vendedor = $workorder['vendedor'];
            $workorder2->estado_trabajo = $workorder['estado_trabajo'];
            $workorder2->diseñador = $workorder['diseñador'];
            $workorder2->tipo_realizado = $workorder['tipo_realizado'];
            $workorder2->tipo_elaborado = $workorder['tipo_elaborado'];
            $workorder2->tipo_impresion = $workorder['tipo_impresion'];
            $workorder2->no_dian = $workorder['no_dian'];
            $workorder2->fecha_dian = $workorder['fecha_dian'];
            $workorder2->habilitado_dian = $workorder['habilitado_dian'];
            $workorder2->observacion_diseño = $workorder['observacion_diseño'];
            $workorder2->fecha_reporte_diseño = $workorder['fecha_reporte_diseño'];
            $workorder2->autorizado_diseño = $workorder['autorizado_diseño'];
            $workorder2->maquina = $workorder['maquina'];
            $workorder2->clase_material = $workorder['clase_material'];
            $workorder2->cantidad_material = $workorder['cantidad_material'];
            $workorder2->cantidad_trabajo = $workorder['cantidad_trabajo'];
            $workorder2->tamano = $workorder['tamano'];
            $workorder2->corte = $workorder['corte'];
            $workorder2->emblocado = $workorder['emblocado'];
            $workorder2->no_inicial = $workorder['no_inicial'];
            $workorder2->no_final = $workorder['no_final'];
            $workorder2->color_tinta = $workorder['color_tinta'];
            $workorder2->no_tintas = $workorder['no_tintas'];
            $workorder2->tinta_especial = $workorder['tinta_especial'];
            $workorder2->color_material = $workorder['color_material'];
            $workorder2->no_copia = $workorder['no_copia'];
            $workorder2->copia1 = $workorder['copia1'];
            $workorder2->copia2 = $workorder['copia2'];
            $workorder2->copia3 = $workorder['copia3'];
            $workorder2->copia4 = $workorder['copia4'];
            $workorder2->original_todas = $workorder['original_todas']? 1 : 0;
            $workorder2->tiro_retiro = $workorder['tiro_retiro']? 1 : 0;
            $workorder2->observacion_impresion = $workorder['observacion_impresion'];
            $workorder2->fecha_reporte_impresion = $workorder['fecha_reporte_impresion'];
            $workorder2->autorizado_impresion = $workorder['autorizado_impresion'];
            $workorder2->levante = $workorder['levante'] ? 1 : 0;
            $workorder2->perforado = $workorder['perforado'] ? 1 : 0;
            $workorder2->laminado = $workorder['laminado'] ? 1 : 0;
            $workorder2->corte_refile = $workorder['corte_refile'] ? 1 : 0;
            $workorder2->engomado = $workorder['engomado'] ? 1 : 0;
            $workorder2->estampado = $workorder['estampado'] ? 1 : 0;
            $workorder2->argollado = $workorder['argollado'] ? 1 : 0;
            $workorder2->engrapado = $workorder['engrapado'] ? 1 : 0;
            $workorder2->sublimacion = $workorder['sublimacion'] ? 1 : 0;
            $workorder2->plastificadomate = $workorder['plastificadomate'] ? 1 : 0;
            $workorder2->plastificadoreserva = $workorder['plastificadoreserva'] ? 1 : 0;
            $workorder2->plastificadouv = $workorder['plastificadouv'] ? 1 : 0;
            $workorder2->otro_acabados = $workorder['otro_acabados'];
            $workorder2->recomendaciones = $workorder['recomendaciones'];
            $workorder2->observacion_acabados = $workorder['observacion_acabados'];
            $workorder2->fecha_reporte_acabados = $workorder['fecha_reporte_acabados'];
            $workorder2->autorizado_acabados = $workorder['autorizado_acabados'];
            $workorder2->save();
            return Redirect::intended('customer/' . $workorder['customers_id'] . '/profile');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $workorder = Workorder::find($id);
        $workorder->delete();
        return Redirect::intended('customer/' . $workorder['customers_id'] . '/profile');
    }

}
