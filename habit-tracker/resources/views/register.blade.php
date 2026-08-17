<x-layout>
    <main class="py-10">
        <section class="bg-white max-w-150 mx-auto p-10 border-2 mt-4 ">

            <h1 class="font-bold text-3xl">Crie sua conta!</h1>
            <p class="font-light">Insira seus dados para se cadastrar.</p>

            <form class="flex flex-col" action={{ route('auth.register') }} method="POST">
                @csrf
                <div class="flex flex-col gap-2 mb-4">
                    <label for="name">Nome</label>
                    <input type="text" name="name" placeholder="Pedro Afonso" class="bg-white p-2 border-2 @error('name') border-red-500 @enderror">
                    @error('name')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex flex-col gap-2 mb-4">
                    <label for="email">Email</label>
                    <input type="email" name="email" placeholder="email..."
                        class="bg-white p-2 border-2 @error('email') border-red-500 @enderror">
                    @error('email')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>


                <div class="flex flex-col gap-2 mb-4">
                    <label for="password">Senha</label>
                    <input type="password" name="password" placeholder="********" class="bg-white p-2 border-2 @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>

                <div class="flex flex-col gap-2 mb-4">
                    <label for="password_confirmation">Confirmar senha</label>
                    <input type="password" name="password_confirmation" placeholder="********" class="bg-white p-2 border-2 @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="text-red-500 text-sm">{{ $message }}</p>
                    @enderror
                </div>
                <button type="submit" class="bg-white border-2 p-2">
                    Cadastrar
                </button>
            </form>
            <p class="font-light text-center">Ja tem uma conta? <a href={{ route('site.login') }} class="font-normal underline hover:opacity-50"> Conecte-se</a></p>
        </section>
    </main>
</x-layout>
