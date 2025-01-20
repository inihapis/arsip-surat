<?php

namespace App\Livewire;

use App\Models\Category;
use Livewire\Component;
use Illuminate\Http\Request;


class CategoryList extends Component
{
    public function render()
    {
        return view('livewire.category-list');
    }

    public function getCategoriesData(Request $request)  
    {  

        $draw = request()->input('draw');
        $start = request()->input('start');
        $length = request()->input('length');
        $search = request()->input('search');
        $order = request()->input('order');


        $categories = Category::query();  
  
        // Pencarian  
        if ($request->has('search') && $search['value'] != '') {  
            $categories->where('name', 'like', '%' . $search['value'] . '%')
                      ->orWhere('letter_code', 'like', '%' . $search['value'] . '%');  
        }  
        
        // Pengurutan  
        if ($request->has('order')) {  
            $column = $order[0]['name'];  
            $dir = $order[0]['dir'];
            $categories->orderBy($column, $dir);  
        }
    
  
        $total = $categories->count();  
        $categories = $categories->skip($start)->take($length)->get();  
  
        return response()->json([  
            'draw' => $draw,  
            'recordsTotal' => $total,  
            'recordsFiltered' => $total,  
            'data' => $categories,  
        ]);  
    }  
    // Melihat data
    public function view($id)
    {
        $categories = Category::findOrFail($id);
        return response()->json($categories);
    }

    // Mengedit data
    public function edit($id)
    {
        $categories = Category::findOrFail($id);
        return response()->json($categories);
    }

    // Menambah data (create)
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'letter_code' => 'required|string|max:255',
        ]);

        // Membuat data baru
        Category::create([
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
        $categories = Category::findOrFail($id);

        // Perbarui data data
        $categories->name = $request->name;
        $categories->letter_code = $request->letter_code;
        $categories->save(); // Simpan perubahan

        return response()->json(['success' => true]);
    }

    // Menghapus data
    public function destroy($id)
    {
        $categories = Category::findOrFail($id);
        $categories->delete();

        return response()->json(['success' => true]);
    }
}
