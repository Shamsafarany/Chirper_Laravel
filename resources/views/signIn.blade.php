<x-layout>
    <x-slot:title>
        Sign In
    </x-slot:title>
    <div class="max-w-2xl mx-auto">
     <h1>Sing In Form</h1>
     <p>{{$username}}</p>
    </div>
    <x-slot:year>
        {{ date('Y') }}
    </x-slot:year>
</x-layout>