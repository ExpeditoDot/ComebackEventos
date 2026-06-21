<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\Evento; 
use Illuminate\Support\Facades\Storage;

class EventosController extends Controller
{
    
    public function index()
    {
        $totalEventos = Evento::count();
        $totalGratuitos = Evento::whereNull('PrecoIngresso')->orWhere('PrecoIngresso', 0)->count();
        $totalPagos = Evento::where('PrecoIngresso', '>', 0)->count();
        
        return view('dashboard', compact('totalEventos', 'totalGratuitos', 'totalPagos')); 
    }

        public function listagemCards()
    {
        $eventos = Evento::paginate(6);
        return view('eventos.eventos', compact('eventos'));
    }

    
    public function tabela()
    {
        $eventos = Evento::paginate(5);
        return view('eventos.tabela', compact('eventos'));
    }

    public function create()
    {
        return view('eventos.create'); 
    }

    public function store(StoreEventoRequest $request)
    {
        $dados = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $caminhoImagem = $request->file('image')->store('eventos', 'public');
            $dados['image'] = $caminhoImagem;
        }

        Evento::create($dados);

       
        return redirect()->route('eventos.cards')->with('success', 'Evento cadastrado com sucesso!');
    }

    
    public function show(int $id)
    {
        $evento = Evento::findOrFail($id);
        return view('eventos.show', compact('evento'));
    }

    public function edit(int $id)
    {
        $evento = Evento::findOrFail($id); 
        return view('eventos.edit', compact('evento')); 
    }

    public function update(UpdateEventoRequest $request, int $id)
    {
        $evento = Evento::findOrFail($id);
        $dados = $request->validated();

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($evento->image) {
                Storage::disk('public')->delete($evento->image);
            }
            $caminhoImagem = $request->file('image')->store('eventos', 'public');
            $dados['image'] = $caminhoImagem;
        }

        $evento->update($dados);

        return redirect()->route('eventos.cards')->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy(int $id)
    {
        $evento = Evento::findOrFail($id);

        if ($evento->image) {
            Storage::disk('public')->delete($evento->image);
        }

        $evento->delete();

        return redirect()->route('eventos.cards')->with('success', 'Evento removido com sucesso!');
    }
}