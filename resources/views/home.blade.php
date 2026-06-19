<x-layout>
    <x-slot:title>
        Home Feed
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="font-bold text-3xl mt-8">Latest Chirps</h1>
        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form action="{{ route('store') }}" method="POST">
                    @csrf
                    <div class="form-control w-full">
                        <textarea name="message" id="message" placeholder="What's on your mind?" rows="4" class="textarea textarea-bordered w-full resize-none @error('message') textarea-error @enderror">{{ old('message') }}</textarea>

                        @error('message')
                        <div class="label">
                            <span class="label-text-alt text-error">{{ $message }}</span>
                        </div>
                        @enderror
                    </div>
                    <div class="flex justify-end mt-2">
                        <button type="submit" class="btn btn-primary btn-sm">Chirp</button>
                    </div>
                </form>
            </div>
        </div>

        {{-- Chirps List --}}
        @forelse ($chirps as $chirp)
            <x-card :chirp="$chirp" />
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