<?php

class IncomeController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
		$now = new DateTime();
		$date = $now->format('Y-m-d');
		$dateYesterday = $now->modify('-1 day')->format('Y-m-d');
		$dateWeek = $now->modify('-7 day')->format('Y-m-d');
		$dateMonth = $now->modify('-1 month')->format('Y-m-d');
		$todayWork = Workorder::whereRaw('customers_id IN (SELECT id FROM customers WHERE users_id = ' . Auth::user()->id . ') and fecha_entrega = "'. $date . '"')->get();
		$yesterdayWork = Workorder::whereRaw('customers_id IN (SELECT id FROM customers WHERE users_id = ' . Auth::user()->id . ') and (fecha_entrega BETWEEN "'. $dateYesterday . '" AND "'. $date . '")')->get();
		$weekWork = Workorder::whereRaw('customers_id IN (SELECT id FROM customers WHERE users_id = ' . Auth::user()->id . ') and (fecha_entrega BETWEEN "'. $dateWeek . '" AND "'. $date . '")')->get();
		$monthWork = Workorder::whereRaw('customers_id IN (SELECT id FROM customers WHERE users_id = ' . Auth::user()->id . ') and (fecha_entrega BETWEEN "'. $dateMonth . '" AND "'. $date . '")')->get();
		
		$allWorks = Workorder::whereRaw('customers_id IN (SELECT id FROM customers WHERE users_id = ' . Auth::user()->id . ')')->get();
		
		$allincome = 0;
		$earnings = 0;
		$pendingearnings = 0;
		foreach($allWorks as $work){	
			$earnings += $work->abono;
			$pendingearnings += $work->saldo;
			$allincome += $work->total;
		}
		
		$monthincome = 0;
		$monthiva = 0;
		foreach($monthWork as $work){			
			$elIVA = $work->iva;
			$valor = $work->valor_trabajo;
			$monthincome += $work->total;
			switch ($elIVA) {
				case "1":
					//MAS IVA
					if ($valor != null)
					{
						$monthiva += ($work->total - $valor);					
					}
					break;
				case "2":
					//CON IVA				
					if ($valor != null)
					{
						$monthiva += ($valor - $work->subtotal);
					}
					break;
			}
		}
		$weekincome = 0;
		$weekiva = 0;
		foreach($weekWork as $work){			
			$elIVA = $work->iva;
			$valor = $work->valor_trabajo;
			$weekincome += $work->total;
			switch ($elIVA) {
				case "1":
					//MAS IVA
					if ($valor != null)
					{
						$weekiva += ($work->total - $valor);					
					}
					break;
				case "2":
					//CON IVA				
					if ($valor != null)
					{
						$weekiva += ($valor - $work->subtotal);
					}
					break;
			}
		}
		
		$yesterdayincome = 0;
		$yesterdayiva = 0;
		foreach($yesterdayWork as $work){			
			$elIVA = $work->iva;
			$valor = $work->valor_trabajo;
			$yesterdayincome += $work->total;
			switch ($elIVA) {
				case "1":
					//MAS IVA
					if ($valor != null)
					{
						$yesterdayiva += ($work->total - $valor);					
					}
					break;
				case "2":
					//CON IVA				
					if ($valor != null)
					{
						$yesterdayiva += ($valor - $work->subtotal);
					}
					break;
			}
		}
				
		$todayincome = 0;
		$todayiva = 0;
		foreach($todayWork as $work){			
			$elIVA = $work->iva;
			$valor = $work->valor_trabajo;
			$todayincome += $work->total;
			switch ($elIVA) {
				case "1":
					//MAS IVA
					if ($valor != null)
					{
						$todayiva += ($work->total - $valor);					
					}
					break;
				case "2":
					//CON IVA				
					if ($valor != null)
					{
						$todayiva += ($valor - $work->subtotal);
					}
					break;
			}
		}
		$data = array(
			'todayincome' => $todayincome,
			'todayiva' => $todayiva,				
			'yesterdayincome'=> $yesterdayincome,
			'yesterdayiva' => $yesterdayiva,
			'weekincome' => $weekincome,
			'weekiva' => $weekiva,
			'monthincome' => $monthincome,
			'monthiva' => $monthiva,
			'earnings' => $earnings,
			'pendingearnings' => $pendingearnings,
			'allincome' => $allincome
		);
		return View::make('user.income')->with($data);
		//return $todayincome;
		
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		//
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}


}
