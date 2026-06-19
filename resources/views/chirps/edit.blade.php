<x-layout>
    <x-slot:title>
        Edit Chirp
    </x-slot:title>

    <div class="max-w-2xl mx-auto">
        <h1 class="font-bold text-3xl mt-8">Edit Chirp</h1>

        <div class="card bg-base-100 shadow mt-8">
            <div class="card-body">
                <form action="{{ route('update', $chirp->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="form-control w-full">
                        <textarea name="message" id="message" placeholder="What's on your mind?" rows="4" class="textarea textarea-bordered w-full resize-none @error('message') textarea-error @enderror">{{ $chirp->message }}</textarea>

                        @error('message')
                            <div class="label">
                                <span class="label-text-alt text-error">{{ $message }}</span>
                            </div>
                        @enderror
                    </div>
                    <div class="card-actions justify-between mt-4">
                        <a href="{{ route('home') }}" class="btn btn-ghost btn-sm">
                            Cancel
                        </a>
                        <button type="submit" class="btn btn-primary btn-sm">Edit Chirp</button>
                    
                    </div>
                    
                </form>
            </div>
        </div>
    </div>  {{-- ← CLOSES the max-w-2xl container --}}

    <x-slot:year>
        {{ date('Y') }}
    </x-slot:year>
</x-layout>