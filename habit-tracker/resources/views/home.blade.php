<h1>
    Home page <br> Ola
</h1>
<p>Nome: {{ $nome }} </p>
<p>Idade: {{ $idade }}</p>

<ul>
    @foreach ($habitos as $item)
        <li> {{ $item }} </li>
    @endforeach
</ul>

@guest
    <p>Voce não esta logado!</p>
@endguest
