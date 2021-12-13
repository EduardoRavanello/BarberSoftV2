<h1>Olá {{ $user->name}}!</h1>
<p>estamos lhe informando que seu agendamento de {{$user->servico}} está {{$user->status}}
    para o dia {{Carbon\Carbon::parse($user->data)->format('d/m/y')}} as  {{$user->hora}}! </p>
</br>
<p>Aguardamos sua presença!</p>
</br>
</br>
<p>Caso não possa comparecer, nos informe via (54)99999-9999</p>
