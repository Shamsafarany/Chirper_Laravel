<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>
      
    <div class="max-w-2xl mx-auto">
       @forelse ($chirps as $chirp)
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                    <div>
                        <div class="font-semibold">{{$chirp->user ? $chirp->user->email: 'Anonymous' }}</div>
                        <div class="mt-1">{{ $chirp->message }}</div>
                        <div class="text-sm text-gray-500 mt-2">{{ $chirp->created_at->diffForHumans() }}</div>
                    </div>
                </div> 
            </div>  
       @empty
            <div class="card bg-base-100 shadow mt-8">
                <div class="card-body">
                      No Chirps Exist Yet!
                </div> 
            </div>
       @endforelse
    </div>
    
    <x-slot:year>
        {{ date('Y') }}
    </x-slot:year>
</x-layout>
