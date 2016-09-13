<?php

namespace Geazi\Interbits\App\Http\Controllers;

use App\Http\Controllers\Controller;
use Geazi\Interbits\App\Http\Requests\FunctionsRequest;
use Geazi\Interbits\App\Models\Functions;

class FunctionsController extends Controller
{

    public function getFunctions()
    {
        $functions = Functions::all();
        return view('interbits::functions.list', ['functions' => $functions]);
    }

    public function getAdd()
    {
        $functions = Functions::all();
        return view('interbits::functions.add', ['functions' => $functions]);
    }

    public function postAdd(FunctionsRequest $request)
    {
        $function = Functions::create($request->all());

        if($function) {
            return redirect('/functions')->with('success', 'Função cadastrada com sucesso');
        }

        return redirect('/functions/add')->with('error', 'Não foi possivel cadastrar a função');
    }

    public function getEdit($id)
    {
        if(empty($id)) {
            return redirect('/functions');
        }

        $function = Functions::find($id);

        if(!$function) {
            return redirect('/functions')->with('error', 'Função não cadastrada');
        }

        return view('interbits::functions.edit', ['function' => $function]);
    }

    public function postEdit(FunctionsRequest $request, $id)
    {
        if(empty($id)) {
            return redirect('/functions');
        }

        $function = Functions::find($id)->update($request->all());

        if($function) {
            return redirect('/functions')->with('success', 'A função foi alterada com sucesso');
        }

        return redirect("functions/edit/{$id}")->with('error', 'Não foi possivel alterar a função');
    }

    public function delete($id)
    {
        if(empty($id)) {
            return redirect('/functions');
        }

        $function = Functions::find($id)->delete();

        if($function) {
            return redirect('/functions')->with('success', 'A função foi removida com sucesso');
        }

        return redirect("functions")->with('error', 'Não foi possivel remover a função');
    }

}