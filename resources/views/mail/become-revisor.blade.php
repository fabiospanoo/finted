<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Candidatura revisore | Presto</title>
</head>

<body style="margin: 0; padding: 0; background-color: #36334A; color: #F5F2FC; font-family: Arial, Helvetica, sans-serif;">
    <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" bgcolor="#36334A"
        style="width: 100%; background-color: #36334A; padding: 36px 16px;">
        <tr>
            <td align="center">
                <table role="presentation" width="600" cellspacing="0" cellpadding="0" border="0"
                    style="width: 100%; max-width: 600px; border: 1px solid #58537A; border-radius: 22px; overflow: hidden; background-color: #433F5C;">
                    <tr>
                        <td style="padding: 28px 36px; border-bottom: 1px solid #58537A;">
                            <span style="display: inline-block; color: #F5F2FC; font-size: 25px; font-weight: bold; letter-spacing: 2px;">
                                Finted
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 36px 36px 12px;">
                            <span style="display: inline-block; padding: 6px 13px; border-radius: 999px; background-color: #C3B1FF; color: #25194A; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">
                                Nuova candidatura
                            </span>
                            <h1 style="margin: 18px 0 10px; color: #F5F2FC; font-size: 27px; line-height: 1.3;">
                                Una nuova persona vuole unirsi al team
                            </h1>
                            <p style="margin: 0; color: #B7B1D0; font-size: 15px; line-height: 1.7;">
                                Hai ricevuto una richiesta per diventare revisore su Presto. Qui trovi i dettagli della candidatura.
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 20px 36px 8px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0"
                                style="width: 100%; border: 1px solid #58537A; border-radius: 14px; background-color: #36334A;">
                                <tr>
                                    <td style="padding: 19px 20px;">
                                        <p style="margin: 0 0 6px; color: #B7B1D0; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">
                                            Candidato
                                        </p>
                                        <p style="margin: 0 0 5px; color: #F5F2FC; font-size: 16px; font-weight: bold;">
                                            {{ $user->name }}
                                        </p>
                                        <a href="mailto:{{ $user->email }}"
                                            style="color: #C3B1FF; font-size: 14px; text-decoration: none;">
                                            {{ $user->email }}
                                        </a>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 16px 36px 8px;">
                            <p style="margin: 0 0 8px; color: #B7B1D0; font-size: 11px; font-weight: bold; letter-spacing: 1px; text-transform: uppercase;">
                                Oggetto della richiesta
                            </p>
                            <h2 style="margin: 0; color: #F5F2FC; font-size: 19px; line-height: 1.45;">
                                {{ $requestSubject }}
                            </h2>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding: 14px 36px 28px;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0"
                                style="width: 100%; border-left: 3px solid #C3B1FF; background-color: #36334A;">
                                <tr>
                                    <td style="padding: 18px 20px; color: #F5F2FC; font-size: 14px; line-height: 1.8; overflow-wrap: anywhere;">
                                        {!! nl2br(e($requestBody)) !!}
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 0 36px 36px;">
                            <a href="{{ route('make.revisor', ['user' => $user]) }}"
                                style="display: inline-block; padding: 14px 25px; border: 1px solid #C3B1FF; border-radius: 999px; background-color: #C3B1FF; color: #25194A; font-size: 14px; font-weight: bold; text-decoration: none;">
                                Rendi revisore
                            </a>
                            <p style="margin: 18px 0 0; color: #B7B1D0; font-size: 12px; line-height: 1.6;">
                                Se il pulsante non funziona, copia questo indirizzo nel browser:<br>
                                <a href="{{ route('make.revisor', ['user' => $user]) }}"
                                    style="color: #C3B1FF; word-break: break-all;">
                                    {{ route('make.revisor', ['user' => $user]) }}
                                </a>
                            </p>
                        </td>
                    </tr>
                    <tr>
                        <td align="center" style="padding: 18px 30px; border-top: 1px solid #58537A;">
                            <p style="margin: 0; color: #B7B1D0; font-size: 12px; line-height: 1.6;">
                                Messaggio automatico dal team <strong style="color: #F5F2FC;">Presto</strong>.<br>
                                Grazie per prenderti cura della nostra community.
                            </p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
