@props(['chirp'])
<div class="card bg-base-100 shadow mt-4">
    <div class="card-body">
        <div class="flex space-x-3">
            {{-- Avatar --}}
            @if ($chirp->user)
                <div class="avatar">
                    <div class="size-10 rounded-full">
                        <img src="https://avatars.laravel.cloud/{{ urlencode($chirp->user->email) }}" 
                            alt="{{ $chirp->user->name }}'s avatar" 
                            class="rounded-full">
                    </div>
                </div>
            @else
                <div class="avatar placeholder">
                    <div class="size-10 rounded-full bg-neutral text-neutral-content flex items-center justify-center">
                        <span class="text-lg font-bold">{{ substr($chirp->user->name ?? 'A', 0, 1) }}</span>
                    </div>
                </div>
            @endif

            {{-- Content --}}
            <div class="flex-1 min-w-0">
                <div class="flex justify-between w-full">
                <div class="flex items-center gap-1 flex-wrap">
                    <span class="font-semibold">{{ $chirp->user ? $chirp->user->name : 'Anonymous' }}</span>
                    <span class="text-base-content/40">·</span>
                    <span class="text-sm text-base-content/40">{{ $chirp->created_at->diffForHumans() }}</span>
                    @if ($chirp->updated_at->gt($chirp->created_at->addSeconds(5)))
                    <span class="text-base-content/60">.</span>
                    <span class="text-base-content/60 italic">edited</span>
                    @endif
                </div>
                @if(auth()->check() && auth()->id() === $chirp->user_id)
                    <div class="flex gap-1">
                        <a href="{{ route('edit', $chirp->id)}}" class="btn btn-ghost btn-xs">Edit</a>
                        <form action="{{route('destroy', $chirp->id)}}" method="POST" >
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-ghost btn-xs text-error" onclick="return confirm('Are you sure you want to delete this chirp?')">
                                Delete
                            </button>
                        </form>
                    </div>
                @endif
                </div>
                <p class="mt-1 break-words whitespace-pre-wrap">{{ $chirp->message }}</p>
            </div>
        </div>
    </div>
</div>