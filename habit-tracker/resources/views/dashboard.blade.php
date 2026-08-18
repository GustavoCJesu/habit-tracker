<x-layout>
    <main class="py-10">
        <h1 class="font-bold text-center text-4xl">
            Dashboard
        </h1>
        <a href="{{ route('habits.create') }}" class="bg-white border-2 p-2 block">
            Cadastrar Habito
        </a>

        @session('success')
            <div class="flex">
                <p class="bg-green-100 border-2 border-green-400 text-green-700 p-3 mb-4">
                    {{ session('success') }}
                </p>
            </div>
        @endsession

        <div>
            <h2 class="text-xl mt-4">
                Listagem dos Hábitos
            </h2>
            <ul class="flex flex-col gap-2">
                @forelse ($habits as $item)
                    <div class="flex gap-2 items-center">
                        <li class="pl-4">
                            <p class="font-bold text-lg">
                                - {{ $item->name }} {{ $item->habitLog->count() }}
                            </p>
                        </li>
                    </div>
                @empty
                    <p class="font-light">Voce ainda não tem nenhum hábito cadastrado</p>
                    <a class="font-light bg-white border-2 p-2" href="habito/cadastrar">Cadastre um agora mesmo!</a>
                @endforelse ()
            </ul>
        </div>
    </main>
</x-layout>
