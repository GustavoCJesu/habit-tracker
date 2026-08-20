<x-layout>
    <main class="py-10 max-w-7xl mx-auto">
        <section class="bg-white max-w-150 mx-auto p-10 border-2 mt-4 habit-shadow">

            <h1 class="font-bold text-3xl">Faça login!</h1>
            <p class="font-light">Insira seus dados para entrar.</p>

            <form class="flex flex-col" action="/login" method="POST">
                @csrf
                <div class="flex flex-col gap-2 mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="email..."
                        class="bg-white p-2 border-2 habit-shadow @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 mb-4">
                    <label for="password">Senha</label>
                    <input type="password" name="password" placeholder="********" class="bg-white p-2 border-2 habit-shadow @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="habit-shadow-lg habit-btn p-2 bg-habit-orange">
                    Entrar
                </button>
            </form>
            <p class="font-light text-center">Ainda não tem conta? <a href={{ route('site.register') }} class="font-normal transition underline hover:opacity-50">Registre-se</a></p>
        </section>
    </main>
</x-layout>
