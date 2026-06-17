<?php

namespace App\Http\Controllers;

use App\Models\Eventos;
use App\Http\Requests\StoreEventoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;


class EventosController extends Controller
{
    
    public function index()
    {
        
        $Eventos = Eventos::orderBy('created_at', 'DESC')->get();
        
        return view('Eventos.index', compact('Eventos'));
    }

    
    public function create()
    {
        return view('Eventos.create');
    }

    
    public function store(StoreEventoRequest $request)
    {
        
        $data = $request->validated();

        
        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('Eventos', 'public');
        }

        
        Eventos::create($data);

       
        return redirect()->route('Eventos.index')->with('parabéns', 'Evento cadastrado com absoluto sucesso!');
    }
}
