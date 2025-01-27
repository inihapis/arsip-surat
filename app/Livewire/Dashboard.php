<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Institution;
use App\Models\User;
use App\Models\Category;
use App\Models\IncomingLetter;
use App\Models\OutgoingLetter;


class Dashboard extends Component
{
    public $institutionCount;
    public $userCount;
    public $categoryCount;
    public $incomingCount;
    public $outgoingCount;
    public $outgoingChart = [];


    public function mount()
    {
        $this->institutionCount = Institution::count();
        $this->userCount = User::count();
        $this->categoryCount = Category::count();
        $this->incomingCount = IncomingLetter::count();
        $this->outgoingCount = OutgoingLetter::count();

        // Mengambil data untuk donut chart dari API  
        $this->fetchOutgoingLetterChart(); 
    }

    public function fetchOutgoingLetterChart()  
    {  
        // Mengambil data dari database  
        $this->outgoingChart = Category::withCount('outgoingLetters') // Menggunakan relasi outgoingLetters  
            ->get()  
            ->map(function ($item) {  
                return [  
                    'Kategori' => $item->name, // Ganti 'name' dengan nama kolom kategori yang sesuai  
                    'Jumlah' => $item->outgoing_letters_count, // Menggunakan count dari relasi  
                ];  
            })  
            ->toArray(); 
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
