<?php

namespace App\Http\Controllers;

use App\Models\Commerce;
use App\Models\DocumentType;
use App\Models\User;
use Illuminate\Http\Request;

class CommerceController extends Controller
{

    public function index()
    {
        return view('dashboard.commerces', [
                'users' => User::join('persons', 'users.id', '=', 'persons.user_id')
                    ->join('commerces', 'users.commerce_id', '=', 'commerces.commerce_id')
                    ->join('document_types', 'persons.document_type_id', 'document_types.document_type_id')
                    ->where('user_profile', 'commerce')
                    ->get(),
                'document_types' => DocumentType::all()
            ]);
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        if ($id == 'register') {
            session()->forget('id_to_update');
            return redirect()->back()->with('register', 1);
        }
        session(['id_to_update' => $id]);
        return redirect()->back()->with('data', User::find($id));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
