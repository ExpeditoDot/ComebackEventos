<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Evento; 
use Illuminate\Support\Facades\Storage;

class EventosController extends Controller
{
    /**
     * 1. LISTAR (Read) - Exibe todos os eventos na Dashboard
     */
    public function index()
    {
        // Busca todos os registros da tabela de eventos no SQLite
        $eventos = Evento::all(); 
        
        // Retorna a view principal do AdminLTE passando a lista de eventos
        return view('dashboard', compact('eventos')); 
    }

    /**
     * 2. EXIBIR FORMULÁRIO DE CADASTRO
     */
    public function create()
    {
        // Retorna a view onde fica o formulário de cadastrar novo evento
        return view('eventos.create'); 
    }

    /**
     * 3. SALVAR REGISTRO (Create) - Recebe os dados do formulário e grava no banco
     */
    public function store(Request $request)
    {
        // Validação obrigatória dos campos ajustada para as chaves minúsculas do formulário
        $request->validate([
            'nome'            => 'required|min:3',
            'local'           => 'required',
            'data'            => 'required',
            'preco_ingresso'  => 'nullable|numeric',
            'descricao'       => 'nullable',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', 
        ], [
            // Mensagens personalizadas em português para a validação
            'nome.required'  => 'O campo nome do evento é obrigatório.',
            'nome.min'       => 'O nome do evento deve ter pelo menos 3 caracteres.',
            'local.required' => 'O local do evento é obrigatório.',
            'data.required'  => 'A data do evento é obrigatória.',
            'preco_ingresso.numeric' => 'O preço deve ser um valor numérico válido.',
            'image.image'    => 'O arquivo enviado deve ser uma imagem.',
            'image.max'      => 'A imagem não pode ter mais que 2MB.',
        ]);

        $dados = $request->all();

        // Lógica para fazer o Upload Seguro da Imagem
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            // Salva a imagem dentro de storage/app/public/eventos
            $caminhoImagem = $request->file('image')->store('eventos', 'public');
            $dados['image'] = $caminhoImagem;
        }

        // Grava as informações no banco de dados SQLite
        Evento::create($dados);

        // Redireciona de volta para a dashboard com uma mensagem de sucesso
        return redirect()->route('dashboard')->with('success', 'Evento cadastrado com sucesso!');
    }

    /**
     * 4. EXIBIR FORMULÁRIO DE EDIÇÃO
     */
    public function edit($id)
    {
        // Localiza o evento pelo ID ou dispara um erro 404 caso não exista
        $evento = Evento::findOrFail($id); 
        
        // Abre a tela de edição preenchendo os campos com os dados desse evento
        return view('eventos.edit', compact('evento')); 
    }

    /**
     * 5. ATUALIZAR REGISTRO (Update) - Grava as alterações feitas no evento
     */
    public function update(Request $request, $id)
    {
        // Validação idêntica para garantir a consistência dos dados ao editar
        $request->validate([
            'nome'            => 'required|min:3',
            'local'           => 'required',
            'data'            => 'required',
            'preco_ingresso'  => 'nullable|numeric',
            'descricao'       => 'nullable',
            'image'           => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ], [
            'nome.required'  => 'O campo nome do evento é obrigatório.',
            'nome.min'       => 'O nome do evento deve ter pelo menos 3 caracteres.',
            'local.required' => 'O local do evento é obrigatório.',
            'data.required'  => 'A data do evento é obrigatória.',
            'preco_ingresso.numeric' => 'O preço deve ser um valor numérico válido.',
            'image.image'    => 'O arquivo enviado deve ser uma imagem.',
        ]);

        $evento = Evento::findOrFail($id);
        $dados = $request->all();

        // Se enviou uma nova imagem na edição, substitui a antiga para economizar espaço
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            if ($evento->image) {
                Storage::disk('public')->delete($evento->image); // Deleta a imagem velha
            }
            $caminhoImagem = $request->file('image')->store('eventos', 'public');
            $dados['image'] = $caminhoImagem;
        }

        // Atualiza os dados no banco
        $evento->update($dados);

        // Redireciona para o painel com mensagem de sucesso
        return redirect()->route('dashboard')->with('success', 'Evento atualizado com sucesso!');
    }

    /**
     * 6. EXCLUIR REGISTRO (Delete) - Remove o evento do banco de dados
     */
    public function destroy($id)
    {
        $evento = Evento::findOrFail($id);

        // Se o evento possuir uma imagem salva, apaga ela também do servidor
        if ($evento->image) {
            Storage::disk('public')->delete($evento->image);
        }

        // Deleta do SQLite
        $evento->delete();

        // Redireciona de volta informando a exclusão
        return redirect()->route('dashboard')->with('success', 'Evento removido com sucesso!');
    }
}