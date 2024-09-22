<h3>Cadastrar Usuário</h3>

@if (session('success'))
    <p style="color: #086;">
        {{ session('success') }}
    </p>
@endif

@if (session('error'))
    <p style="color: #f00;">
        {{ session('error') }}
    </p>
@endif

@if ($errors->any())
    <p style="color: #f00;">
        @foreach ($errors->all() as $error)
            {{ $error }}<br>
        @endforeach
    </p>
@endif

<form action="{{ route('users.store') }}" method="POST">
    @csrf
    @method('POST')

    <label>Nome: </label>
    <input type="text" name="name" id="name" placeholder="Nome completo"
        value="{{ old('name') }}"><br><br>

    <label>E-mail: </label>
    <input type="email" name="email" id="email" placeholder="Melhor e-mail do usuário"
        value="{{ old('email') }}"><br><br>

    <label>Senha: </label>
    <input type="password" name="password" id="password" placeholder="Senha com no mínimo 6 caracteres" value="{{ old('password') }}"><br><br>

    <button type="submit">Cadastrar</button><br><br>

</form>