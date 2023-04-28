<?php

namespace App\Http\Livewire;

use App\Models\Contact;
use Livewire\Component;

class ContactManager extends Component
{
    public $contacts;
    
    protected $rules = [
        'contacts.*.name' => 'required|unique:contacts,name',
        'contacts.*.email' => 'required|email|unique:contacts,email'
    ];

    public function render()
    {
        return view('livewire.contact-manager');
    }

    public function mount()
    {
        $this->contacts = Contact::all();
    }

    public function add()
    {
        $this->contacts->push(new Contact());
    }

    public function save()
    {
        $this->validate();
    }
}
