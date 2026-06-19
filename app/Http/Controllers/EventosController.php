<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
    public function edit(Evento $evento)    
    {
        return view ('eventos.edit', compact('evento'));
    }
        public function update(UpdateEventoRequest $request, Evento $evento)
    {
        $evento-> update($request-> only(['Nome','Local','Data','PrecoIngresso', 'descricao']));
        if ($request->hasFile('image')) {
            if ($evento->image) {
                storage::disk('public')->delete($evento->image);
            }
            $evento->image = $request->file('image')->store('eventos','public');
        } else {
            $evento->image = $evento->image;
        }
        $evento->update(["image" => $evento->image]);
        return redirect()->route('eventos');
    }

    public function destroy(Evento $evento)
    {
        if ($evento->image) {
            storage::disk('public')->delete($evento->image);
        }
        $evento->delete();
        return redirect()->route('eventos');
    }
}
