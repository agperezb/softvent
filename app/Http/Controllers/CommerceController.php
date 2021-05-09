<?php

namespace App\Http\Controllers;

use App\Models\Commerce;
use App\Models\DocumentType;
use App\Models\Person;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Throwable;

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

    public function index_cashier()
    {
        return view('dashboard.commerces', [
            'users' => User::join('persons', 'users.id', '=', 'persons.user_id')
                ->join('commerces', 'users.commerce_id', '=', 'commerces.commerce_id')
                ->join('document_types', 'persons.document_type_id', 'document_types.document_type_id')
                ->where('user_profile', 'cashiers')
                ->where('users.commerce_id', Auth::user()->commerce_id)
                ->get(),
            'document_types' => DocumentType::all()
        ]);
    }

    public function create()
    {
        //
    }

    public function status($id)
    {
        $user = User::find($id);

        try {
            if ($user->user_status == 1) {
                User::where('id', $id)
                    ->update(['user_status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado el comercio exitosamente.');
            } else {
                User::where('id', $id)
                    ->update(['user_status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado el comercio exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Tenemos problemas, reintente mas tarde...');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'commerce_name' => 'required|string|max:50',
            'commerce_description' => 'required|string|max:100',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|confirmed|min:8',
            'document_type_id' => 'required|exists:document_types,document_type_id',
            'person_name' => 'required|string|max:50',
            'person_last_name' => 'required|string|max:50',
            'person_document' => 'required|string|max:12',
            'person_phone' => 'required|string|max:12',
            'person_birthdate' => 'required|date',
        ]);
        $request['commerce_status'] = 1;
        $request['user_status'] = 1;
        $request['user_profile'] = 'commerce';

        try {
            DB::beginTransaction();
            $commerce = Commerce::create([
                'commerce_name' => $request->commerce_name,
                'commerce_description' => $request->commerce_description,
                'commerce_status' => $request->commerce_status
            ]);

            $user = User::create([
                'user_profile' => $request->user_profile,
                'user_status' => $request->user_status,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'commerce_id' => $commerce->commerce_id
            ]);

            Person::create([
                'user_id' => $user->id,
                'document_type_id' => $request->document_type_id,
                'person_name' => $request->person_name,
                'person_last_name' => $request->person_last_name,
                'person_document' => $request->person_document,
                'person_phone' => $request->person_phone,
                'person_birthdate' => $request->person_birthdate,
            ]);
            DB::commit();
            return redirect()->back()->with('status', 'Comercio creado exitosamente.');

        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Tenemos problemas, reintente mas tarde...');
        }
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
        $request->validate([
            'commerce_name' => 'required|string|max:50',
            'commerce_description' => 'required|string|max:100',
            'document_type_id' => 'required|exists:document_types,document_type_id',
            'person_name' => 'required|string|max:50',
            'person_last_name' => 'required|string|max:50',
            'person_phone' => 'required|string|max:12',
            'person_birthdate' => 'required|date',
        ]);

        $user = User::find($id);
        if ($user->email != $request->email) {
            $request->validate([
                'email' => 'required|string|email|max:100|unique:users',
            ]);
        }
        if ($user->person->person_document != $request->person_document) {
            $request->validate([
                'person_document' => 'required|string|max:12|unique:persons',
            ]);
        }

        try {
            DB::beginTransaction();

            User::where('id', $id)
                ->update([
                    'email' => $request->email,
                ]);

            Person::where('user_id', $id)
                ->update([
                    'document_type_id' => $request->document_type_id,
                    'person_name' => $request->person_name,
                    'person_last_name' => $request->person_last_name,
                    'person_document' => $request->person_document,
                    'person_phone' => $request->person_phone,
                    'person_birthdate' => $request->person_birthdate,
                ]);

            Commerce::where('commerce_id', $user->commerce_id)
                ->update([
                    'commerce_name' => $request->commerce_name,
                    'commerce_description' => $request->commerce_description
                ]);
            DB::commit();
            return redirect()->back()->with('status', 'Comercio actualizado exitosamente.');

        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', 'Tenemos problemas, reintente mas tarde...');
        }
    }

    public function destroy($id)
    {
        //
    }
}
