<?php

namespace App\Http\Controllers;

use App\Models\Pessoa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class PessoaController extends Controller
{
    /**
     * Valida os dados vindos da requisição de criação e atualização.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    public function validator(array $data, $pessoa = false)
    {
        return Validator::make($data, [
            'nome' => [
                $pessoa ? 'nullable' : 'required',
                'string',
                'min:2',
                'max:255'
            ],
            'telefone' => [
                $pessoa ? 'nullable' : 'required',
                $pessoa ? Rule::unique('pessoas')->ignore($pessoa->id) : 'unique:pessoas',
                'string',
                'regex:/^([0-9\s\-\+\(\)]*)$/',
                'min:12',
                'max:20'
            ],
            'email' => [
                $pessoa ? 'nullable' : 'required',
                $pessoa ? Rule::unique('pessoas')->ignore($pessoa->id) : 'unique:pessoas',
                'email:dns',
                'max:255'
            ],
        ]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pessoas = Pessoa::paginate(10);
        return view('pessoas.index', compact('pessoas')); 
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pessoas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = $this->validator($request->all());
        if ($validator->fails()) return redirect()->back()
            ->with('failure', "Informações inválidas!")
            ->withInput($request->input())
            ->withErrors($validator);

        $pessoa = Pessoa::create($request->all());
        return redirect()->back()->with('success', "Pessoa de nº {$pessoa->id}, {$pessoa->nome}, adicionada.");
    }

    /**
     * Display the specified resource.
     */
    public function show(Pessoa $pessoa)
    {
        return view('pessoas.show', compact('pessoa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pessoa $pessoa)
    {
        return view('pessoas.edit', compact('pessoa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pessoa $pessoa)
    {
        $validator = $this->validator($request->all(), $pessoa);
        if ($validator->fails()) return redirect()->back()
            ->with('failure', "Informações inválidas!")
            ->withInput($request->input())
            ->withErrors($validator);

        $pessoa->update($request->all());
        return redirect()->route('pessoas.index')->with('success', "Pessoa de nº {$pessoa->id}, {$pessoa->nome}, atualizada.");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pessoa $pessoa)
    {
        $pessoa->delete();
        return redirect()->route('pessoas.index')->with('success', "Pessoa de nº {$pessoa->id}, {$pessoa->nome}, excluída.");
    }
}
