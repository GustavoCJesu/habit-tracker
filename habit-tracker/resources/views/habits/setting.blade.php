<x-layout>
    <main class="py-10 min-h-[calc(100vh-160px)] px-4">

        <x-navbar />

        @session('success')
            <div class="flex">
                <p class="bg-green-100 border-2 border-green-400 text-green-700 p-3 mb-4">
                    {{ session('success') }}
                </p>
            </div>
        @endsession

        <div>
            <h2 class="text-xl mt-8 mb-4">
                {{ date('d-m-Y') }}
            </h2>
            <ul class="flex flex-col gap-2">
                @forelse ($habits as $item)
                    <li class="habit-shadow-lg p-2 bg-[#FFDAAC]">
                        <div class="flex gap-2 items-center">
                            
                            <p class="font-bold text-lg">
                                {{ $item->name }}
                            </p>
                            <form action="{{ route('habits.destroy', $item) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit"
                                    class="bg-red-500 text-white p-1 hover:opacity-50 cursor-pointer block">
                                    <x-icons.trash />
                                </button>
                            </form>
                            <a href="{{ route('habits.edit', $item->id) }}"
                                class="bg-gray-500 text-white p-1  hover:opacity-50 cursor-pointer" type="submit">
                                <x-icons.pencil />
                            </a>
                        </div>
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
