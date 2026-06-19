<?php

namespace App\Http\Controllers;

// Importação dos Form Requests que você criou para ganhar os 1,5 pontos de validação
use App\Http\Requests\StoreEventoRequest;
use App\Http\Requests\UpdateEventoRequest;
use App\Models\Evento; 
use Illuminate\Support\Facades\Storage;

class EventosController extends Controller
{
    
    public function index()
    {
         $eventos = Evento::paginate(5); 
        
        return view('dashboard', compact('eventos')); 
    }

    public function tabela()
    {
        // Busca os mesmos eventos do banco de dados, paginados de 5 em 5
        $eventos = Evento::paginate(5);
        
        // Retorna a sua view específica chamada 'tabela.blade.php'
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

        return redirect()->route('dashboard')->with('success', 'Evento cadastrado com sucesso!');
    }

    
    public function edit(int $id)
    {
        $evento = Evento::findOrFail($id); 
        return view('eventos.edit', compact('evento')); 
    }

   
    public function update(UpdateEventoRequest $request, int $id)
    {
        $evento = Evento::findOrFail($id);
        
        // Coleta os dados já validados de acordo com as regras do seu Form Request
        $dados = $request->validated();

        // Substituição da Imagem Antiga
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($evento->image) {
                Storage::disk('public')->delete($evento->image);
            }
            $caminhoImagem = $request->file('image')->store('eventos', 'public');
            $dados['image'] = $caminhoImagem;
        }

        $evento->update($dados);

        return redirect()->route('dashboard')->with('success', 'Evento atualizado com sucesso!');
    }

    
    public function destroy(int $id)
    {
        $evento = Evento::findOrFail($id);

        if ($evento->image) {
            Storage::disk('public')->delete($evento->image);
        }

        $evento->delete();

        return redirect()->route('dashboard')->with('success', 'Evento removido com sucesso!');
    }
}