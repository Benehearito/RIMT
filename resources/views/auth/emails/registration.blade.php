<p>
    Hola {{ $user->name }},{{ $user->email }},{{ $user->registration_token }}, por favor confirma tu correo electrónico presionando el siguente enlace:
</p>
<p>
    <a href="{{ $url }}">{{ $url }}</a>
</p>