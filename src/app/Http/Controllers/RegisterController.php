<?php

namespace Geazi\Interbits\App\Http\Controllers;


use App\Http\Controllers\Controller;
use Geazi\Interbits\App\Http\Requests\UsersRequest;
use Geazi\Interbits\App\Models\User;
use Geazi\Interbits\App\Models\Functions;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

/**
 * Description of RegisterController
 *
 * @author Geazi
 */
class RegisterController extends Controller
{

    public function getUsers()
    {
        $users = User::all();
        return view('interbits::register.list', ['users' => $users]);
    }

    public function getSearch(Request $request)
    {
        $query = $request->input('query');

        $users = DB::table('users')
            ->select('users.*', 'functions.name as function')
            ->join('functions', 'users.function_id', '=', 'functions.id')
            ->where('users.email', 'LIKE', "%{$query}%")
            ->orWhere('users.name', 'LIKE', "%{$query}%")
            ->orWhere('users.phone', 'LIKE', "%{$query}%")
            ->get();

        return view('interbits::register.search', ['users' => $users, 'query' => $query]);
    }

    public function getAdd()
    {
        $functions = Functions::all();
        return view('interbits::register.add', ['functions' => $functions]);
    }

    public function postAdd(UsersRequest $request)
    {
        $user = User::create($request->all());

        if ($user) {
            return redirect('/register')->with('success', 'Usuário cadastrado com sucesso');
        }

        return redirect('/register/add')->with('error', 'Não foi possivel cadastrar o usuário');
    }

    public function getEdit($id)
    {
        if (empty($id)) {
            return redirect('/register');
        }

        $user = User::find($id);

        if (!$user) {
            return redirect('/register')->with('error', 'Usuário não cadastrado');
        }
        $functions = Functions::all();

        return view('interbits::register.edit', ['user' => $user, 'functions' => $functions]);
    }

    public function delete($id)
    {
        if(empty($id)) {
            return redirect('/register');
        }

        $function = User::find($id)->delete();

        if($function) {
            return redirect('/register')->with('success', 'O Usuário foi removido com sucesso');
        }

        return redirect("register")->with('error', 'Não foi possivel remover o usuário');
    }

}
