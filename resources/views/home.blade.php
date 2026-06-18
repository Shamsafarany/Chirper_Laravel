<x-layout>
    <x-slot:title>
        Home
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="font-bold text-3xl mt-8">Latest Chirps</h1>
        @forelse ($chirps as $chirp)
            <x-card :chirp="$chirp"/>
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

