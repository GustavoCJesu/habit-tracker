<x-layout>
    <main class="py-10">
        <h1>
            Dashboard
        </h1>
        <p>
            Bem vindo(a) {{ auth()->user()->name }}
        </p>
        <div>
            <h2 class="text-xl mt-4">
                Listagem dos Hábitos
            </h2>
            <ul class="flex flex-col gap-2">
                @forelse ($habits as $item)
                    <div class="flex gap-2 items-center">
                        <li class="pl-4">
                            <p class="font-bold text-xl">
                                - {{ $item->name }}
                            </p>
                            <p>
                               {{ $item->habitLog->count()}}
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
