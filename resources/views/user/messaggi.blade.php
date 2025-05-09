<x-layout>
    
    <div class="container-fluid">
        <div class="row vh-100">
            <!-- SIDEBAR CHAT LIST -->
            
            @livewire('user.list-chat')

            <!-- CHAT AREA -->
            @livewire('user.chat-area')

        </div>
    </div>
</x-layout>
