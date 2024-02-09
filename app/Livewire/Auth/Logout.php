<?php

namespace App\Livewire\Auth;

use Livewire\Attributes\On;
use Livewire\Component;

class Logout extends Component
{
    public function render(): string
    {
        return <<<BLADE
            <x-button 
                icon="o-power" 
                class="btn-circle btn-ghost btn-xs" 
                tooltip-left="logoff" 
                wire:click="logout"
            />
        BLADE;
    }

    #[On('logout')]
    public function logout(): void
    {
        auth()->logout();

        session()->invalidate();
        session()->regenerateToken();

        $this->redirect(route('login'));
    }
}