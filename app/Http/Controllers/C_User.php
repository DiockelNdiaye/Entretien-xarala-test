<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class C_User extends Controller
{
    public function create()
    {
        return view('client');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'nom' => ['required', 'max:25', 'min:2'],
            'email' =>['required'],
            'phone' =>['required','numeric', 'min:9'],
            'status' =>['required','max:25', 'min:2']
        ],[
            'required'=>'Le :attribute est obligatoire',
            'min'=>'Le :attribute doit prendre au minimun :min caractères',
            'max'=>'Le :attribute ne doit pas dépasser :max caractères',
            'numeric'=>'Le :attribute doit être numérique'
        ]);

        User::create([
            'nom' => $request->nom,
            'email' =>$request->email,
            'phone' =>$request->phone,
            'status' =>$request->status
        ]);
        session()->flash('message', 'Client bien enregistré avec success');
        return redirect('/lister-client');
    }

    public function show()

    {
        // $clients = User::paginate(4);
        $clients = User::all();

        return view('liste_client', compact('clients'));
    }

    //Récupération des données uniquement
    public function edit()
    {
        $id = $_GET['id'];
        $client = User::findOrFail($id);
        return view('client', compact('client'));
    }

    //Fait la modification des données dans la base de données
    public function update(Request $request, $id)
    {
        $updateData = $request->validate([
            'nom' => ['required', 'max:25', 'min:2'],
            'email' =>['required'],
            'phone' =>['required','numeric','min:9'],
            'status' =>['required', 'max:25', 'min:2']
        ],[
            'required'=>'Le :attribute est obligatoire',
            'min'=>'Le :attribute doit prendre au minimun :min caractères',
            'max'=>'Le :attribute ne doit pas dépasser :max caractères',
            'numeric'=>'Le :attribute doit être numérique'
        ]);
        User::whereId($id)->update($updateData);
        session()->flash('message', 'Modifications réussi avec success');
        return redirect('/lister-client');
    }

    public function Suppression($id)
    {
        $client = User::findOrFail($id);
        $client->delete();
        session()->flash('messagesup', 'Suppression avec success...');
        return redirect('/lister-client');
    }
}
