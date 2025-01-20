<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Illuminate\Http\Request;

class UserList extends Component
{
    public function render()
    {
        return view('livewire.user-list');
    }
    public function getUsersData(Request $request)  
    {  

        $draw = request()->input('draw');
        $start = request()->input('start');
        $length = request()->input('length');
        $search = request()->input('search');
        $order = request()->input('order');


        $users = User::query();  
  
        // Pencarian  
        if ($request->has('search') && $search['value'] != '') {  
            $users->where('name', 'like', '%' . $search['value'] . '%')
                      ->orWhere('email', 'like', '%' . $search['value'] . '%');  
        }  
        
        // Pengurutan  
        if ($request->has('order')) {  
            $column = $order[0]['name'];  
            $dir = $order[0]['dir'];
            $users->orderBy($column, $dir);  
        }
    
  
        $total = $users->count();  
        $users = $users->skip($start)->take($length)->get();  
  
        return response()->json([  
            'draw' => $draw,  
            'recordsTotal' => $total,  
            'recordsFiltered' => $total,  
            'data' => $users,  
        ]);  
    }  
    // Melihat data
    public function view($id)
    {
        $users = User::findOrFail($id);
        return response()->json($users);
    }

    // Mengedit data
    public function edit($id)
    {
        $users = User::findOrFail($id);
        return response()->json($users);
    }

    // Menambah data (create)
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
        ]);

        // Membuat data baru
        User::create([
            'name' => $request->name,
            'letter_code' => $request->letter_code,
        ]);


        return response()->json(['success' => true]);
    }

    // Mengupdate data (update)
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'letter_code' => 'required|string|max:255',
        ]);

        // Temukan data berdasarkan ID
        $users = User::findOrFail($id);

        // Perbarui data data
        $users->name = $request->name;
        $users->letter_code = $request->letter_code;
        $users->save(); // Simpan perubahan

        return response()->json(['success' => true]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users->delete();

        return response()->json(['success' => true]);
    }


}
