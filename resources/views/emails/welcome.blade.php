<p>Olá {{ $usuario->nome }},</p>

<p > Seja Bem-vindo ao {{ config('app.name')}}. Por Favor, Verfique o seu e-mail clique no link abaixo</p>

<table role="presentation" class="btn btn-primary">
    <tbody>
    <tr>
        <td align="center">
            <table role="presentation"  >
                <tbody>
                    <tr>
                        <td>
                            <a href="{{$verifyEmailLink}}" target="_blank">Verificar email</a>
                        </td>
                    </tr>
                </tbody>
            </table>

        </td>
    </tr>
    </tbody>
</table>
<p>Ou, simplimente copie e cole link abaixo em seu navegador</p>
<p>{{$verifyEmailLink}}</p>

