<x-layout>
    <main class="py-10">
        <section class="bg-white max-w-150 mx-auto p-10 border-2 mt-4 ">

            <h1 class="font-bold text-3xl">Crie seu novo hábito</h1>

            <form class="flex flex-col" action="{{ route('habits.store') }}" method="POST">
                @csrf
                <div class="flex flex-col gap-2 mb-4">
                    <label for="name">Nome do Hábito</label>
                    <input type="text" name="name" placeholder="Ler um livro..."
                        class="bg-white p-2 border-2 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-white border-2 p-2 hover:bg-amber-200 transition">
                    Cadastrar
                </button>
            </form>
        </section>
    </main>
</x-layout>
