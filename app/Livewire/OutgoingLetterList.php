<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\OutgoingLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;  
use Illuminate\Support\Facades\Crypt;  

class OutgoingLetterList extends Component
{
    public function render()
    {
        return view('livewire.outgoing-letter-list');
    }

    public function getOutgoingLettersData(Request $request)  
    {  

        $draw = request()->input('draw');
        $start = request()->input('start');
        $length = request()->input('length');
        $search = request()->input('search');
        $order = request()->input('order');

        $outgoing_letters = OutgoingLetter::with(['institution', 'category']);  


        // Pencarian  
        if ($request->has('search') && $search['value'] != '') {  
            $searchValue = $search['value'];  

            $outgoing_letters->where('letter_number', 'like', '%' . $searchValue . '%')
                        ->orWhere('subject', 'like', '%' . $searchValue . '%')
                        ->orWhere('description', 'like', '%' . $searchValue . '%')
                        ->orWhereHas('institution', function($q) use ($searchValue) {  
                            $q->where('name', 'like', '%' . $searchValue . '%');  
                        }); ;  
        }  
        
        // Pengurutan  
        if ($request->has('order')) {  
            $column = $order[0]['name'];  
            $dir = $order[0]['dir'];
            // Cek kolom yang ingin diurutkan  
            if ($column === 'institution.name') {  
                $outgoing_letters->join('institutions', 'outgoing_letters.institution_id', '=', 'institutions.id')  
                    ->orderBy('institutions.name', $dir)  
                    ->select('outgoing_letters.*');  
            } else if ($column === 'category.name') {  
                    $outgoing_letters->join('categories', 'outgoing_letters.category_id', '=', 'categories.id')
                                    ->orderBy('categories.name', $dir)  
                                    ->select('outgoing_letters.*');  
            } else if ($column === 'subject_description') {  
                    $outgoing_letters->orderBy('subject', $dir)  
                                     ->orderBy('description', $dir);
            } else {  
                $outgoing_letters->orderBy($column, $dir);  
            } 
        }
    
  
        $total = $outgoing_letters->count();  
        $outgoing_letters = $outgoing_letters->skip($start)->take($length)->get();
  
        return response()->json([  
            'draw' => $draw,  
            'recordsTotal' => $total,  
            'recordsFiltered' => $total,  
            'data' => $outgoing_letters,  
        ]);  
    }

    public function showDocument($encryptedId)  
    {  
        // Dekripsi ID untuk mendapatkan ID asli  
        $id = Crypt::decrypt($encryptedId);  
        $outgoing_letter = OutgoingLetter::findOrFail($id);  
    
        // Cek akses pengguna (sesuaikan dengan logika akses yang kamu punya)  
        if (auth()->check()) {  
            // Mengembalikan file jika pengguna terautentikasi  
            $filePath = $outgoing_letter->file;  
            
            $extension = pathinfo($filePath, PATHINFO_EXTENSION);  
            $contentType = 'application/octet-stream'; // Default  
    
            if ($extension === 'pdf') {  
                $contentType = 'application/pdf';  
            } elseif ($extension === 'doc') {  
                $contentType = 'application/msword';  
            } elseif ($extension === 'docx') {  
                $contentType = 'application/vnd.openxmlformats-officedocument.wordprocessingml.document';  
            }  
    
            // Mengembalikan file untuk preview  
            return response()->file(Storage::disk('public')->path('document/' . $filePath), [  
                'Content-Type' => $contentType,  
                'Content-Disposition' => 'inline; filename="' . basename($filePath) . '"'  
            ]);    
 
        }  
    
        return response()->json(['error' => 'Unauthorized'], 403);  
    }  


    // Melihat data
    public function view($id)
    {
        $outgoing_letters = OutgoingLetter::with(['institution','category'])->findOrFail($id);
        $outgoing_letters->file_route = route('document.outgoing-letter', ['encryptedId' => Crypt::encrypt($outgoing_letters->id)]);      
        
        return response()->json($outgoing_letters);
    }

    // Mengedit data
    public function edit($id)
    {
        $outgoing_letters = OutgoingLetter::with(['institution','category'])->findOrFail($id);  
        return response()->json($outgoing_letters);
    }

    public function upload(Request $request)  
    {  
        // Validasi file yang diupload  
        $request->validate([  
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048',
        ]);  
    
        // Membuat nama file unik  
        $fileName = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);  
        $fileExtension = $request->file('file')->getClientOriginalExtension();  
        $uniqueFileName = $fileName . '_' . time() . '.' . $fileExtension; // Menggunakan time()  
    
        $request->file('file')->storeAs('document/outgoing_letters', $uniqueFileName, 'public');  
    
        return response()->json(['file_name' => 'outgoing_letters/' . $uniqueFileName]);  
    }  

    // Menambah data (create)
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'institution_id' => 'required|exists:institutions,id',
            'category_id' => 'required|exists:categories,id',
            'letter_number' => 'required|string|max:255',  
            'letter_date' => 'required|date',  
            'subject' => 'nullable|string|max:255',  
            'description' => 'nullable|string',  
            'file' => 'required|file|mimes:pdf,doc,docx|max:2048', 
        ]);

        // Panggil metode upload untuk mengunggah file  
        $uploadResponse = $this->upload($request);  
        $filePath = $uploadResponse->getData()->file_name; // Ambil path file dari respons 

        // Membuat data baru
        OutgoingLetter::create([
            'institution_id' => $request->institution_id,
            'category_id' => $request->category_id,
            'letter_number' => $request->letter_number,
            'letter_date' => $request->letter_date,
            'subject' => $request->subject,
            'description' => $request->description,
            'file' => $filePath,  
        ]);


        return response()->json(['success' => true]);
    }

    // Mengupdate data (update)
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'institution_id' => 'required|exists:institutions,id',
            'category_id' => 'required|exists:categories,id',    
            'letter_number' => 'required|string|max:255',  
            'letter_date' => 'required|date',
            'subject' => 'nullable|string|max:255',  
            'description' => 'nullable|string',  
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',   
        ]);

        // Temukan data berdasarkan ID
        $outgoing_letters = OutgoingLetter::findOrFail($id);

        // Jika ada file baru yang diunggah  
        if ($request->hasFile('file')) {  
            // Hapus file lama jika ada  
            if ($outgoing_letters->file) {  
                Storage::disk('public')->delete('document/' . $outgoing_letters->file);  
            }  
    
            // Panggil metode upload untuk mengunggah file  
            $uploadResponse = $this->upload($request);  
            $filePath = $uploadResponse->getData()->file_name; // Ambil path file dari respons  
    
            // Perbarui path file  
            $outgoing_letters->file = $filePath;  
        }



        // Perbarui data
        $outgoing_letters->institution_id = $request->institution_id;
        $outgoing_letters->category_id = $request->category_id;
        $outgoing_letters->letter_number = $request->letter_number;
        $outgoing_letters->letter_date = $request->letter_date;
        $outgoing_letters->subject = $request->subject;
        $outgoing_letters->description = $request->description;
        $outgoing_letters->save(); // Simpan perubahan

        return response()->json(['success' => true]);
    }

    // Menghapus data
    public function destroy($id)
    {
        
        $outgoing_letters = OutgoingLetter::findOrFail($id);
        
        // Periksa apakah ada file yang terkait  
        if ($outgoing_letters->file) {    
            // Hapus file dari storage  
            Storage::disk('public')->delete('document/' . $outgoing_letters->file);    
        }  
        $outgoing_letters->delete();

        return response()->json(['success' => true]);    
    }
}
