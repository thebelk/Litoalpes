<?php

class WorkorderController extends \BaseController {

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $workorder = Workorder::all();
		if(isset($_GET['buscar'])){
				$buscar = Input::get('buscar');
				$workorder =Workorder::whereRaw('customers_id IN (SELECT id FROM customers WHERE users_id = ' . Auth::user()->id . ') and (clase_material LIKE "%'.$buscar.'%" or diseñador LIKE "%'
				.$buscar.'%" or diseñador LIKE "%'.$buscar.'%" or vendedor LIKE "%'.$buscar.'%" )')->get();
			}else{
				$workorder =Workorder::whereRaw('customers_id IN (SELECT id FROM customers WHERE users_id = ' . Auth::user()->id . ')')->get();
			}
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
        $rules = array(
            'tipo_orden' => 'required', //'1' => 'Seleccionar', '2' => 'Servicio','3' => 'Producto'
            'no_orden' => 'required',
            'clase_trabajo' => 'required',
            'fecha_entrega' => 'required',
            'encuadernado',
            'tipo_encuadernado',
            'sublimaciones',
            'tipo_sublimacion',
            'sello',
            'tipo_sello',
            'gigantografia',
            'tipo_gigantografia',
            'impresiones',
            'tipo_impresiones',
            'servicio_numerado', //1.si 0.no
            'servicio_perforado', //1.si 0.no
            'servicio_levante', //1.si 0.no
            'servicio_engrapado', //1.si 0.no
            'servicio_grafado', //1.si 0.no 
            'servicio_laminado', //1.si 0.no
            'servicio_otro', //1.si 0.no
            'servicio_engomado', //1.si 0.no
            'servicio_corte', //1.Si 0.No    
            'servicio_refile', //1.Si 0.No 
            'servicio_repuje', //1.Si 0.No         
            'detalles_trabajo',
            'valor_trabajo' => 'required',
            'abono',
            'saldo',
            'subtotal',
            'iva',
            'no_factura',
            'total',
            'vendedor',
            'estado_trabajo', //1. diseño  2.impresion 3.acabados 4.disponible 6.entregado 7.por realizar                      
            'diseñador',
            'tipo_realizado', // '1' => 'Seleccionar ','2' => 'Diseño Nuevo','3' => 'Corrección','4' => 'Quema de Master','5' => 'Diseño según Muestra','6' => 'Identidad Corporativa'
            'tipo_impresion', //'1' => 'Seleccionar', '2' => 'Digital', '3' => 'Litográfica','4' => 'Gigantografia' ,'5' => 'Sello','6' => 'Plancha / Mater'                      
            'plancha',
            'tipo_plancha', //'1' => 'Seleccionar', '2' => 'Ctp 52', '3' => 'M.Doble Carta'
            'master',
            'tipo_master', //'1' => 'Seleccionar', '2' => 'Medio Master', '3' => 'Master Entero'
            'no_dian',
            'fecha_dian',
            'habilitado_dian',
            'observacion_diseño',
            'fecha_reporte_diseño',
            'revisado_diseño',
            'autorizado_diseño',
            'maquina',
            'clase_material',
            'cantidad_trabajo',
            'tamano',
            'cantidad_material',
            'corte_material',
            'emblocado',
            'no_inicial',
            'no_final',
            'no_tintas', // 1. una tinta 2.dos tintas 3. tres tintas 4.poligromia 
            'color_tinta',
            'tinta_especial',
            'color_material',
            'no_copia', // 0. Ninguno 1.una copia  2.dos copias 3.tres copias 4.cuatro copias                      
            'copia1', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
            'copia2', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
            'copia3', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
            'copia4', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
            'numerado', //1.Si 0.No
            'numeradoras', //'1' => 'Cat.Numeradoras ', '2 ' => '1 Numeradora', '3' => '2 Numeradoras', '4' => '3 Numeradoras','5' => '4 Numeradoras'
            'original_todas', //1.Si 0.No
            'original_copia',
            'tiro_retiro',
            'observacion_impresion',
            'fecha_reporte_impresion',
            'autorizado_impresion',
            'levante', //1.si 0.no
            'engrapado', //1.si 0.no             
            'laminado', //1.si 0.no
            'plastificadouv', //1.si 0.no
            'engomado', //1.si 0.no
            'corte', //1.Si 0.No            
            'refile', //1.Si 0.No
            'plastificadomate', //1.Si 0.No
            'perforado', //1.si 0.no
            'argollado',
            'grafado',
            'plastificadoreserva',
            'empastado', //1.Si 0.No
            'tapaclinto', //1.Si 0.No
            'tapanormal', //1.Si 0.No
            'hojassueltas', //1.Si 0.No                        
            'otro_acabados', //0. Ninguno 1.Por la cabeza 2.lado izquierdo 3.lado derecho 
            'recomendaciones',
            'observacion_acabados',
            'fecha_reporte_acabados',
            'autorizado_acabados',
            'customers_id' => ''
        );
        $validate = Validator::make($post_data, $rules);
        $post_data['subtotal'] = (int) $post_data['subtotal'];
        //return $post_data;
        if ($validate) {
            //$customer = Customer::find($id);
            //$post_data['customers_id'] = $customer->id;
            Workorder::create($post_data);
            /*

              if($post_data['estado_trabajo']==0){
              return Redirect::intended('customer/' . $post_data['customers_id'] . '/workorder/edit')
              } */

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
        $rules = array(
            'tipo_orden' => 'required', //'1' => 'Seleccionar', '2' => 'Servicio','3' => 'Producto'
            'no_orden' => 'required',
            'clase_trabajo' => 'required',
            'fecha_entrega' => 'required',
            'encuadernado',
            'tipo_encuadernado',
            'sublimaciones',
            'tipo_sublimacion',
            'sello',
            'tipo_sello',
            'gigantografia',
            'tipo_gigantografia',
            'impresiones',
            'tipo_impresiones',
            'servicio_numerado', //1.si 0.no
            'servicio_perforado', //1.si 0.no
            'servicio_levante', //1.si 0.no
            'servicio_engrapado', //1.si 0.no
            'servicio_grafado', //1.si 0.no 
            'servicio_laminado', //1.si 0.no
            'servicio_otro', //1.si 0.no
            'servicio_engomado', //1.si 0.no
            'servicio_corte', //1.Si 0.No    
            'servicio_refile', //1.Si 0.No 
            'servicio_repuje', //1.Si 0.No         
            'detalles_trabajo',
            'valor_trabajo' => 'required',
            'abono',
            'saldo',
            'subtotal',
            'iva',
            'no_factura',
            'total',
            'vendedor',
            'estado_trabajo', //1. diseño  2.impresion 3.acabados 4.disponible 6.entregado 7.por realizar                      
            'diseñador',
            'tipo_realizado', // '1' => 'Seleccionar ','2' => 'Diseño Nuevo','3' => 'Corrección','4' => 'Quema de Master','5' => 'Diseño según Muestra','6' => 'Identidad Corporativa'
            'tipo_impresion', //'1' => 'Seleccionar', '2' => 'Digital', '3' => 'Litográfica','4' => 'Gigantografia' ,'5' => 'Sello','6' => 'Plancha / Mater'                      
            'plancha',
            'tipo_plancha', //'1' => 'Seleccionar', '2' => 'Ctp 52', '3' => 'M.Doble Carta'
            'master',
            'tipo_master', //'1' => 'Seleccionar', '2' => 'Medio Master', '3' => 'Master Entero'
            'no_dian',
            'fecha_dian',
            'habilitado_dian',
            'observacion_diseño',
            'fecha_reporte_diseño',
            'revisado_diseño',
            'autorizado_diseño',
            'maquina',
            'clase_material',
            'cantidad_trabajo',
            'tamano',
            'cantidad_material',
            'corte_material',
            'emblocado',
            'no_inicial',
            'no_final',
            'no_tintas', // 1. una tinta 2.dos tintas 3. tres tintas 4.poligromia 
            'color_tinta',
            'tinta_especial',
            'color_material',
            'no_copia', // 0. Ninguno 1.una copia  2.dos copias 3.tres copias 4.cuatro copias                      
            'copia1', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
            'copia2', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
            'copia3', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
            'copia4', // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
            'numerado', //1.Si 0.No
            'numeradoras', //'1' => 'Cat.Numeradoras ', '2 ' => '1 Numeradora', '3' => '2 Numeradoras', '4' => '3 Numeradoras','5' => '4 Numeradoras'
            'original_todas', //1.Si 0.No
            'original_copia',
            'tiro_retiro',
            'observacion_impresion',
            'fecha_reporte_impresion',
            'autorizado_impresion',
            'levante', //1.si 0.no
            'engrapado', //1.si 0.no             
            'laminado', //1.si 0.no
            'plastificadouv', //1.si 0.no
            'engomado', //1.si 0.no
            'corte', //1.Si 0.No            
            'refile', //1.Si 0.No
            'plastificadomate', //1.Si 0.No
            'perforado', //1.si 0.no
            'argollado',
            'grafado',
            'plastificadoreserva',
            'empastado', //1.Si 0.No
            'tapaclinto', //1.Si 0.No
            'tapanormal', //1.Si 0.No
            'hojassueltas', //1.Si 0.No                        
            'otro_acabados', //0. Ninguno 1.Por la cabeza 2.lado izquierdo 3.lado derecho 
            'recomendaciones',
            'observacion_acabados',
            'fecha_reporte_acabados',
            'autorizado_acabados',
            'customers_id' => ''
        );
        $validate = Validator::make($workorder, $rules);
        if ($validate) {
            $workorder2 = Workorder::find($id);
            $workorder2->tipo_orden = $workorder['tipo_orden'];
            $workorder2->no_orden = $workorder['no_orden'];
            $workorder2->clase_trabajo = $workorder['clase_trabajo'];
            $workorder2->fecha_entrega = $workorder['fecha_entrega'];
            $workorder2->encuadernado = Input::has('encuadernado') ? 1 : 0;
            $workorder2->tipo_encuadernado = $workorder['tipo_encuadernado'];
            $workorder2->sublimaciones = Input::has('sublimaciones') ? 1 : 0;
            $workorder2->tipo_sublimacion = $workorder['tipo_sublimacion'];
            $workorder2->sello = Input::has('sello') ? 1 : 0;
            $workorder2->tipo_sello = $workorder['tipo_sello'];
            $workorder2->gigantografia = Input::has('gigantografia') ? 1 : 0;
            $workorder2->tipo_gigantografia = $workorder['tipo_gigantografia'];
            $workorder2->impresiones = Input::has('impresiones') ? 1 : 0;
            $workorder2->tipo_impresiones = $workorder['tipo_impresiones'];
            $workorder2->servicio_numerado = Input::has('servicio_numerado') ? 1 : 0; //1.si 0.no
            $workorder2->servicio_perforado = Input::has('servicio_perforado') ? 1 : 0; //1.si 0.no
            $workorder2->servicio_levante = Input::has('servicio_levante') ? 1 : 0;  //1.si 0.no
            $workorder2->servicio_engrapado = Input::has('servicio_engrapado') ? 1 : 0; //1.si 0.no
            $workorder2->servicio_grafado = Input::has('servicio_grafado') ? 1 : 0; //1.si 0.no 
            $workorder2->servicio_laminado = Input::has('servicio_laminado') ? 1 : 0;  //1.si 0.no
            $workorder2->servicio_otro = $workorder['servicio_otro'];  //1.si 0.no
            $workorder2->servicio_engomado = Input::has('servicio_engomado') ? 1 : 0; //1.si 0.no
            $workorder2->servicio_corte = Input::has('servicio_corte') ? 1 : 0; //1.Si 0.No    
            $workorder2->servicio_refile = Input::has('servicio_refile') ? 1 : 0; //1.Si 0.No 
            $workorder2->servicio_repuje = Input::has('servicio_repuje') ? 1 : 0; //1.Si 0.No         
            $workorder2->detalles_trabajo = $workorder['detalles_trabajo'];
            $workorder2->valor_trabajo = $workorder['valor_trabajo'];
            $workorder2->abono = $workorder['abono'];
            $workorder2->saldo = $workorder['saldo'];
            $workorder2->subtotal = $workorder['subtotal'];
            $workorder2->iva = $workorder['iva'];
            $workorder2->no_factura = $workorder['no_factura'];
            $workorder2->total = $workorder['total'];
            $workorder2->vendedor = $workorder['vendedor'];
            $workorder2->estado_trabajo = $workorder['estado_trabajo'];
            $workorder2->diseñador = $workorder['diseñador'];
            $workorder2->tipo_realizado = $workorder['tipo_realizado'];
            $workorder2->tipo_impresion = $workorder['tipo_impresion'];
            $workorder2->plancha = Input::has('plancha') ? 1 : 0;
            $workorder2->tipo_plancha = $workorder['tipo_plancha'];
            $workorder2->master = Input::has('master') ? 1 : 0;
            $workorder2->tipo_master = $workorder['tipo_master'];
            $workorder2->no_dian = $workorder['no_dian'];
            $workorder2->fecha_dian = $workorder['fecha_dian'];
            $workorder2->habilitado_dian = $workorder['habilitado_dian'];
            $workorder2->observacion_diseño = $workorder['observacion_diseño'];
            $workorder2->fecha_reporte_diseño = $workorder['fecha_reporte_diseño'];
            $workorder2->revisado_diseño = $workorder['revisado_diseño'];
            $workorder2->autorizado_diseño = $workorder['autorizado_diseño'];
            $workorder2->maquina = $workorder['maquina'];
            $workorder2->clase_material = $workorder['clase_material'];
            $workorder2->cantidad_trabajo = $workorder['cantidad_trabajo'];
            $workorder2->tamano = $workorder['tamano'];
            $workorder2->cantidad_material = $workorder['cantidad_material'];
            $workorder2->corte_material = $workorder['corte_material'];
            $workorder2->emblocado = $workorder['emblocado'];
            $workorder2->no_inicial = $workorder['no_inicial'];
            $workorder2->no_final = $workorder['no_final'];
            $workorder2->no_tintas = $workorder['no_tintas'];
            $workorder2->color_tinta = $workorder['color_tinta'];
            $workorder2->tinta_especial = $workorder['tinta_especial'];
            $workorder2->color_material = $workorder['color_material'];
            $workorder2->no_copia = $workorder['no_copia'];
            $workorder2->copia1 = $workorder['copia1']; // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
            $workorder2->copia2 = $workorder['copia2']; // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco                     
            $workorder2->copia3 = $workorder['copia3']; // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
            $workorder2->copia4 = $workorder['copia4']; // 1. Amarillo 2. Rosado 3. Verde 4.Azul 5.Blanco
            $workorder2->numerado = Input::has('numerado') ? 1 : 0;
            $workorder2->numeradoras = $workorder['numeradoras'];
            $workorder2->original_todas = Input::has('original_todas') ? 1 : 0;
            $workorder2->original_copia = Input::has('original_copia') ? 1 : 0;
            $workorder2->tiro_retiro = Input::has('tiro_retiro') ? 1 : 0;
            $workorder2->observacion_impresion = $workorder['observacion_impresion'];
            $workorder2->fecha_reporte_impresion = $workorder['fecha_reporte_impresion'];
            $workorder2->autorizado_impresion = $workorder['autorizado_impresion'];
            $workorder2->levante = Input::has('levante') ? 1 : 0;  //1.si 0.no
            $workorder2->engrapado = Input::has('engrapado') ? 1 : 0; //1.si 0.no             
            $workorder2->laminado = Input::has('laminado') ? 1 : 0;  //1.si 0.no
            $workorder2->plastificadouv = Input::has('plastificadouv') ? 1 : 0;  //1.si 0.no
            $workorder2->engomado = Input::has('engomado') ? 1 : 0; //1.si 0.no
            $workorder2->corte = Input::has('corte') ? 1 : 0; //1.Si 0.No            
            $workorder2->refile = Input::has('refile') ? 1 : 0; //1.Si 0.No
            $workorder2->plastificadomate = Input::has('plastificadomate') ? 1 : 0; //1.Si 0.No
            $workorder2->perforado = Input::has('perforado') ? 1 : 0; //1.si 0.no
            $workorder2->argollado = Input::has('argollado') ? 1 : 0;
            $workorder2->grafado = Input::has('grafado') ? 1 : 0;
            $workorder2->plastificadoreserva = Input::has('plastificadoreserva') ? 1 : 0;
            $workorder2->empastado = Input::has('empastado') ? 1 : 0; //1.Si 0.No
            $workorder2->tapaclinto = Input::has('tapaclinto') ? 1 : 0; //1.Si 0.No
            $workorder2->tapanormal = Input::has('tapanormal') ? 1 : 0; //1.Si 0.No
            $workorder2->hojassueltas = Input::has('hojassueltas') ? 1 : 0; //1.Si 0.No                        
            $workorder2->otro_acabados = $workorder['otro_acabados']; //0. Ninguno 1.Por la cabeza 2.lado izquierdo 3.lado derecho 
            $workorder2->recomendaciones = $workorder['recomendaciones'];
            $workorder2->observacion_acabados = $workorder['observacion_acabados'];
            $workorder2->fecha_reporte_acabados = $workorder['fecha_reporte_acabados'];
            $workorder2->autorizado_acabados = $workorder['autorizado_acabados'];

            $workorder2->save();
            return Redirect::intended('worklist/' . $id . '/ver');
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
        $customer = Customer::find($workorder['customers_id']);
        $workorder->delete();
        return Redirect::intended('customer/' . $customer['id'] . '/profile');
    }

}
