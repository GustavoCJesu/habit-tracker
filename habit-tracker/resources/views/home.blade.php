<x-layout>
    <main class="py-10 max-w-7xl mx-auto">
        <h1>
            Veja seus habitos
        </h1>
        @auth
            <h2>
                Bem vindo {{ auth()->user()->name }}!!
            </h2>
            <p>Voce esta logado!!!</p>
        @endauth
    </main>
</x-layout>
