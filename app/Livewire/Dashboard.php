<?php

namespace App\Livewire;
use Livewire\Component;
use App\Models\Institution;
use App\Models\User;
use App\Models\Category;


class Dashboard extends Component
{
    public $institutionCount;
    public $userCount;
    public $categoryCount;

    public function mount()
    {
        // Menghitung jumlah institusi
        $this->institutionCount = Institution::count();
        $this->userCount = User::count();
        $this->categoryCount = Category::count();
    }

    public function render()
    {
        return view('livewire.dashboard');
    }
}
