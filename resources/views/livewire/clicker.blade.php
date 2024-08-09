<div>
    @if (session('success'))
       <span class="px-3 py-3 bg-green-600 text-white rounded">{{ session('success') }}</span>
    @endif


        <form wire:submit="createNewUser" action="" class="form-container">
            <h2>Create New User</h2>
            <div class="input-group">
                <label for="name">Name</label>
                <input wire:model="name" type="text" name="name" id="name">


                @error('name')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="email">Email</label>
                <input wire:model="email" type="email" name="email" id="email">

                @error('email')
                <span class="text-red-500  text-xs">{{ $message }}</span>
                @enderror
            </div>
            <div class="input-group">
                <label for="password">Password</label>
                <input wire:model="password" type="password" name="password" id="password">
                @error('password')
                <span class="text-red-500 text-xs">{{ $message }}</span>
                @enderror
            </div>
            <button type="submit" class="btn">Create</button>
            <div class="user-list">
                @foreach($users as $user)
                    <h3 class="user-name">{{ $user->name }}</h3>
                @endforeach

                {{ $users->links('vendor.livewire.test') }}
            </div>
        </form>

    </div>

