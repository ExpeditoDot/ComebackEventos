<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;
use Illuminate\Http\Request;

class EventosController extends Controller
{

    public function index()
    {
        $evento = Evento::all();
        return view('eventos.index', compact('evento'));
    }

    public function create()
    {
        return view('eventos.create');
    }

    public function ListarEventos()
    {
        $eventos = Evento::all();
        return view ('eventos.eventos', compact('eventos'));
    }

    public function TabelaEventos()
    {
        $eventos = Evento::paginate(4);
        return view('eventos.tabela', compact('eventos'));
    }

  
    public function store(StoreEventoRequest $request)
    {
        $path = $request->file('image')->store('eventos', 'public');

        Evento::create([
            'Nome' => $request->Nome,
            'Local' => $request->Local,
            'Data' => $request->Data,
            'PrecoIngresso' => $request -> PrecoIngresso,
            'image' => $path,
        ]);

        return redirect() ->route('eventos');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
