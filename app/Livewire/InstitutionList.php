<?php

namespace App\Livewire;

use App\Models\Institution;
use Livewire\Component;
use Illuminate\Http\Request;

class InstitutionList extends Component
{
    public function render()
    {
        return view('livewire.institution-list');
    }

    public function updatedData()  
    {  
        // Emit event setelah data diperbarui  
        $this->emit('dataUpdated');  
    } 
    
    public function getInstitutionsData(Request $request)
    {
        $draw = request()->input('draw');
        $start = request()->input('start');
        $length = request()->input('length');
        $search = request()->input('search');
        $order = request()->input('order');

        $institutions = Institution::query();

        if ($search['value']) {
            $institutions->where('name', 'like', '%' . $search['value'] . '%')
                ->orWhere('address', 'like', '%' . $search['value'] . '%');
        }
        
        // Pengurutan  
        if ($request->has('order')) {  
            $column = $order[0]['name'];  
            $dir = $order[0]['dir'];
            $institutions->orderBy($column, $dir);  
        }

        $total = $institutions->count();
        $institutions = $institutions->skip($start)->take($length)->get();

        return response()->json([
            'draw' => $draw,
            'recordsTotal' => $total,
            'recordsFiltered' => $total,
            'data' => $institutions,
        ]);
    }

    // Melihat data
    public function view($id)
    {
        $institution = Institution::findOrFail($id);
        return response()->json($institution);
    }

    // Mengedit data
    public function edit($id)
    {
        $institution = Institution::findOrFail($id);
        return response()->json($institution);
    }

    // Menambah data (create)
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([  
            'name' => 'required|string|max:255',  
            'address' => 'required|string|max:255',  
            'phone' => 'nullable|string|max:15',   
            'email' => 'nullable|email|max:255', 
        ]);  

        // Membuat data baru
        Institution::create([
            'name' => $request->name,
            'address' => $request->address,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);


        return response()->json(['success' => true]);
    }

    // Mengupdate data (update)
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([  
            'name' => 'required|string|max:255',  
            'address' => 'required|string|max:255',  
            'phone' => 'nullable|string|max:15', // Opsional, maksimal 15 karakter  
            'email' => 'nullable|email|max:255', // Opsional, harus dalam format email yang valid  
        ]);  

        // Temukan data berdasarkan ID
        $institution = Institution::findOrFail($id);

        // Perbarui data data
        $institution->name = $request->name;
        $institution->address = $request->address;
        $institution->phone = $request->phone;
        $institution->email = $request->email;
        $institution->save(); // Simpan perubahan

        return response()->json(['success' => true]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $institution = Institution::findOrFail($id);
        $institution->delete();

        return response()->json(['success' => true]);
    }
}



