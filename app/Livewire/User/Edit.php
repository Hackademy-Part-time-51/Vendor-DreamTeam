<?php

namespace App\Livewire\User;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Storage;

class Edit extends Component
{
    use WithFileUploads;

    public $name, $gender, $phone, $profile_photo;
    public User $user;

    public function mount()
    {
        $this->user = Auth::user();
        $this->name = $this->user->name;
        $this->gender = $this->user->gender;
        $this->phone = $this->user->phone;
        
    }
    public function update()
    {
       
        
        if ($this->profile_photo) {
            // Cancella la vecchia immagine, se esiste
            if ($this->user->profile_image) {
                Storage::disk('public')->delete($this->user->profile_image);
            }
            logger('Uploading file...');
            // Salva la nuova immagine
            $path = $this->profile_photo->store('profile-photos', 'public');
                logger('Saved at: ' . $path);

            $this->user->profile_image = $path;
        }

        $this->user->name = $this->name;
        $this->user->gender = $this->gender;
        $this->user->phone = $this->phone;

        $this->user->save();

        redirect()->route('personalArea', $this->user->id)->with('message', 'Profilo aggiornato con successo!');
    }

    public function render()
    {
        return view('livewire.user.edit');
    }
}
