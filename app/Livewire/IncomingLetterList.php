<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\IncomingLetter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;  
use Illuminate\Support\Facades\Crypt;  

class IncomingLetterList extends Component
{
    public function render()
    {
        return view('livewire.incoming-letter-list');
    }

    public function updatedData()  
    {  
        // Emit event setelah data diperbarui  
        $this->emit('dataUpdated');  
    } 


    public function getIncomingLettersData(Request $request)  
    {  

        $draw = request()->input('draw');
        $start = request()->input('start');
        $length = request()->input('length');
        $search = request()->input('search');
        $order = request()->input('order');

        $incoming_letters = IncomingLetter::with('institution');  

        // Pencarian  
        if ($request->has('search') && $search['value'] != '') {  
            $searchValue = $search['value'];  

            $incoming_letters->where('letter_number', 'like', '%' . $searchValue . '%')
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
                $incoming_letters->join('institutions', 'incoming_letters.institution_id', '=', 'institutions.id')  
                    ->orderBy('institutions.name', $dir)  
                    ->select('incoming_letters.*');  
            } else if ($column === 'subject_description') {  
                    $incoming_letters->orderBy('subject', $dir)  
                                     ->orderBy('description', $dir);
            } else {  
                $incoming_letters->orderBy($column, $dir);  
            } 
        }
    
  
        $total = $incoming_letters->count();  
        $incoming_letters = $incoming_letters->skip($start)->take($length)->get();
  
        return response()->json([  
            'draw' => $draw,  
            'recordsTotal' => $total,  
            'recordsFiltered' => $total,  
            'data' => $incoming_letters,  
        ]);  
    }

    public function showDocument($encryptedId)  
    {  
        // Dekripsi ID untuk mendapatkan ID asli  
        $id = Crypt::decrypt($encryptedId);  
        $incoming_letter = IncomingLetter::findOrFail($id);  
    
        // Cek akses pengguna (sesuaikan dengan logika akses yang kamu punya)  
        if (auth()->check()) {  
            // Mengembalikan file jika pengguna terautentikasi  
            $filePath = $incoming_letter->file;  
            
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
        $incoming_letters = IncomingLetter::with('institution')->findOrFail($id);
        $incoming_letters->file_route = route('document.incoming-letter', ['encryptedId' => Crypt::encrypt($incoming_letters->id)]);      
        
        return response()->json($incoming_letters);
    }

    // Mengedit data
    public function edit($id)
    {
        $incoming_letters = IncomingLetter::with('institution')->findOrFail($id);  
        return response()->json($incoming_letters);
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
    
        $request->file('file')->storeAs('document/incoming_letters', $uniqueFileName, 'public');  
    
        return response()->json(['file_name' => 'incoming_letters/' . $uniqueFileName]);  
    }  

    // Menambah data (create)
    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'institution_id' => 'required|exists:institutions,id',
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
        IncomingLetter::create([
            'institution_id' => $request->institution_id,
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
            'letter_number' => 'required|string|max:255',  
            'letter_date' => 'required|date',
            'subject' => 'nullable|string|max:255',  
            'description' => 'nullable|string',  
            'file' => 'nullable|file|mimes:pdf,doc,docx|max:2048',   
        ]);

        // Temukan data berdasarkan ID
        $incoming_letters = IncomingLetter::findOrFail($id);

        // Jika ada file baru yang diunggah  
        if ($request->hasFile('file')) {  
            // Hapus file lama jika ada  
            if ($incoming_letters->file) {  
                Storage::disk('public')->delete('document/' . $incoming_letters->file);  
            }  
    
            // Panggil metode upload untuk mengunggah file  
            $uploadResponse = $this->upload($request);  
            $filePath = $uploadResponse->getData()->file_name; // Ambil path file dari respons  
    
            // Perbarui path file  
            $incoming_letters->file = $filePath;  
        }



        // Perbarui data
        $incoming_letters->institution_id = $request->institution_id;
        $incoming_letters->letter_number = $request->letter_number;
        $incoming_letters->letter_date = $request->letter_date;
        $incoming_letters->subject = $request->subject;
        $incoming_letters->description = $request->description;
        $incoming_letters->save(); // Simpan perubahan

        return response()->json(['success' => true]);
    }

    // Menghapus data
    public function destroy($id)
    {
        
        $incoming_letters = IncomingLetter::findOrFail($id);
        
        // Periksa apakah ada file yang terkait  
        if ($incoming_letters->file) {    
            // Hapus file dari storage  
            Storage::disk('public')->delete('document/' . $incoming_letters->file);    
        }  
        $incoming_letters->delete();

        return response()->json(['success' => true]);    
    }
}