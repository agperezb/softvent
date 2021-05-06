<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Provider;
use Illuminate\Http\Request;
use Throwable;

class ProviderController extends Controller
{
    public function index()
    {
        return view('dashboard.providers', [
            'providers' => Provider::all()
        ]);
    }

    public function create()
    {
        //
    }

    public function status($id)
    {
        $provider = Provider::find($id);

        try {
            if ($provider->provider_status == 1) {
                Provider::where('provider_id', $id)
                    ->update(['provider_status' => 0]);
                return redirect()->back()->with('status', 'Se ha desactivado el proveedor exitosamente.');
            } else {
                Provider::where('provider_id', $id)
                    ->update(['provider_status' => 1]);
                return redirect()->back()->with('status', 'Se ha activado el proveedor exitosamente.');
            }
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Tenemos problemas, reintente mas tarde...');
        }
    }

    public function store(Request $request)
    {
        $request->validate([
            'provider_name' => 'required|string|max:30',
            'provider_nit' => 'required|string|max:15|unique:providers',
            'provider_direction' => 'required|string|max:50',
            'provider_phone' => 'required|string|max:12',
        ]);

        $request['provider_status'] = 1;

        try {
            Provider::create([
                'provider_name' => $request->provider_name,
                'provider_nit' => $request->provider_nit,
                'provider_direction' => $request->provider_direction,
                'provider_phone' => $request->provider_phone,
                'provider_status' => $request->provider_status,
            ]);
            return redirect()->back()->with('status', 'Proveedor creado exitosamente.');

        } catch (Throwable $e) {
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
        return redirect()->back()->with('data', Provider::find($id));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'provider_name' => 'required|string|max:30',
            'provider_nit' => 'required|string|max:15',
            'provider_direction' => 'required|string|max:50',
            'provider_phone' => 'required|string|max:12',
        ]);

        try {

            Provider::where('provider_id', $id)
                ->update([
                    'provider_name' => $request->provider_name,
                    'provider_nit' => $request->provider_nit,
                    'provider_direction' => $request->provider_direction,
                    'provider_phone' => $request->provider_phone,
                ]);
            return redirect()->back()->with('status', 'Proveedor actualizado exitosamente.');

        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Tenemos problemas, reintente mas tarde...');
        }
    }

    public function destroy($id)
    {
        try {
            $provider = Provider::find($id);
//            if (count($category->product) > 0) {
//                return redirect()->back()->with('warning', 'Eliminación fallida, la categoría cuenta con productos.');
//            }
            $provider->delete();
            return redirect()->back()->with('status', 'Proveedor eliminado exitosamente.');
        } catch (Throwable $e) {
            return redirect()->back()->with('error', 'Tenemos problemas, reintente mas tarde...');
        }
    }
}
