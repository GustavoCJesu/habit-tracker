<x-layout>
    <main class="max-w-5xl mx-auto py-10 min-h-[calc(100vh-160px)] px-4">

        <x-navbar />
        <div class="h-15">
            @session('success')
                <div class="flex">
                    <p class="bg-green-100 border-2 border-green-400 text-green-700 p-3 mb-4">
                        {{ session('success') }}
                    </p>
                </div>
            @endsession
            @session('delete')
                <div class="flex">
                    <p class="bg-yellow-100 border-2 border-yellow-500 text-yellow-700 p-3 mb-4">
                        {{ session('delete') }}
                    </p>
                </div>
            @endsession
        </div>

        <div>
            <h2 class="text-xl mt-8 mb-4">
                Confirmar Hábitos
            </h2>
            <ul class="flex flex-col gap-2">
                @forelse ($habits as $item)
                    <li class="habit-shadow-lg p-2 bg-[#FFDAAC]">
                        <form id="form-{{ $item->id }}" method="POST"
                            action="{{ route('habits.toggle', $item->id) }}"
                            class="flex gap-2 items-center">
                            @csrf
                            <input id="check-box{{ $item->id }}" type="checkbox"
                                {{ $item->is_completed ? 'checked' : '' }}
                                {{ $item->wasCompletedToday() ? 'checked' : ''}}
                                onChange="document.getElementById('form-{{ $item->id }}').submit()" class="w-5 h-5">
                            <p class="font-bold text-lg">
                                {{ $item->name }}
                            </p>
                        </form>
                    </li>

                @empty
                    <p class="font-light">Voce ainda não tem nenhum hábito cadastrado</p>
                    <a class="font-light bg-white border-2 p-2" href="{{ route('habits.create') }}">Cadastre um agora
                        mesmo!</a>
                @endforelse ()
            </ul>
        </div>
        
    </main>
</x-layout>
