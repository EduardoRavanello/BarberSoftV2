<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Agendamento;

class FullCalenderController extends Controller
{
    public function index(Request $request)
    {
    	if($request->ajax())
    	{
    		$data = Agendamento::whereDate('dataInicio', '>=', $request->start)
                       ->whereDate('dataFim',   '<=', $request->end)
                       ->get(['id_agendamento', 'dataInicio', 'dataFim', 'status', 'id_cliente', 'id_servico', 'id_executor']);
            return response()->json($data);
    	}
    	return view('teste');
    }

    public function action(Request $request)
    {
    	if($request->ajax())
    	{
    		if($request->type == 'add')
    		{
    			$event = Agendamento::create([
    				'dataInicio' =>	$request->dataInicio,
    				'dataFim' =>	$request->dataFim,
                    'status' =>	"Criado",
                    'id_cliente' =>	"1",
                    'id_servico' =>	"1",
                    'id_executor' => "1"
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'update')
    		{
    			$event = Agendamento::find($request->id_agendamento)->update([
    				'dataInicio' =>	$request->dataInicio,
    				'dataFim' =>	$request->dataFim,
                    'status' =>	"Criado",
                    'id_cliente' =>	"1",
                    'id_servico' =>	"1",
                    'id_executor' => "1"
    			]);

    			return response()->json($event);
    		}

    		if($request->type == 'delete')
    		{
    			$event = Agendamento::find($request->id_agendamento)->delete();

    			return response()->json($event);
    		}
    	}
    }
    //
}
