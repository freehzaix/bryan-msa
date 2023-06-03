<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reset passord</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <style type="text/css">
        * {
            -ms-text-size-adjust:100%;
            -webkit-text-size-adjust:none;
            -webkit-text-resize:100%;
            text-resize:100%;
        }
        a{
            outline:none;
            color:#40aceb;
            text-decoration:underline;
        }
        a:hover{text-decoration:none !important;}
        .nav a:hover{text-decoration:underline !important;}
        .title a:hover{text-decoration:underline !important;}
        .title-2 a:hover{text-decoration:underline !important;}
        .btn:hover{opacity:0.8;}
        .btn a:hover{text-decoration:none !important;}
        .btn{
            -webkit-transition:all 0.3s ease;
            -moz-transition:all 0.3s ease;
            -ms-transition:all 0.3s ease;
            transition:all 0.3s ease;
        }
        table td {border-collapse: collapse !important;}
        .ExternalClass, .ExternalClass a, .ExternalClass span, .ExternalClass b, .ExternalClass br, .ExternalClass p, .ExternalClass div{line-height:inherit;}
        @media only screen and (max-width:500px) {
            table[class="flexible"]{width:100% !important;}
            table[class="center"]{
                float:none !important;
                margin:0 auto !important;
            }
            *[class="hide"]{
                display:none !important;
                width:0 !important;
                height:0 !important;
                padding:0 !important;
                font-size:0 !important;
                line-height:0 !important;
            }
            td[class="img-flex"] img{
                width:100% !important;
                height:auto !important;
            }
            td[class="aligncenter"]{text-align:center !important;}
            th[class="flex"]{
                display:block !important;
                width:100% !important;
            }
            td[class="wrapper"]{padding:0 !important;}
            td[class="holder"]{padding:30px 15px 20px !important;}
            td[class="nav"]{
                padding:20px 0 0 !important;
                text-align:center !important;
            }
            td[class="h-auto"]{height:auto !important;}
            td[class="description"]{padding:30px 20px !important;}
            td[class="i-120"] img{
                width:120px !important;
                height:auto !important;
            }
            td[class="footer"]{padding:5px 20px 20px !important;}
            td[class="footer"] td[class="aligncenter"]{
                line-height:25px !important;
                padding:20px 0 0 !important;
            }
            tr[class="table-holder"]{
                display:table !important;
                width:100% !important;
            }
            th[class="thead"]{display:table-header-group !important; width:100% !important;}
            th[class="tfoot"]{display:table-footer-group !important; width:100% !important;}
        }
    </style>

</head>

<body style="margin:0; padding:0;" bgcolor="#eaeced">
    <table style="min-width:320px;" width="100%" cellspacing="0" cellpadding="0" bgcolor="#eaeced">
        <!-- fix for gmail -->
        <tr>
            <td class="hide">
                <table width="600" cellpadding="0" cellspacing="0" style="width:600px !important;">
                    <tr>
                        <td style="min-width:600px; font-size:0; line-height:0;">&nbsp;</td>
                    </tr>
                </table>
            </td>
        </tr>
        <tr>
            <td class="wrapper" style="padding:0 10px;">
                <!-- module 1 -->
                <table data-module="module-1" data-thumb="thumbnails/01.png" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td data-bgcolor="bg-module" bgcolor="#eaeced">
                            <table class="flexible" width="600" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="padding:29px 0 30px;">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            
                                        </table>
                                    </td>
                                </tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <!-- module 2 -->
                <table data-module="module-2" data-thumb="thumbnails/02.png" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td data-bgcolor="bg-module" bgcolor="#eaeced">
                            <table class="flexible" width="600" align="center" style="margin:0 auto;" cellpadding="0" cellspacing="0">
                                
                                <tr>
                                    <td data-bgcolor="bg-block" class="holder" style="padding:58px 60px 52px;" bgcolor="#f9f9f9">
                                        <table width="100%" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td data-color="title" data-size="size title" data-min="25" data-max="45" data-link-color="link title color" data-link-style="text-decoration:none; color:#292c34;" class="title" align="center" style="font:35px/38px Arial, Helvetica, sans-serif; color:#292c34; padding:0 0 24px;">
                                                    Nouveau mot de passe
                                                </td>
                                            </tr>
                                            <tr>
                                                <td data-color="text" data-size="size text" data-min="10" data-max="26" data-link-color="link text color" data-link-style="font-weight:bold; text-decoration:underline; color:#40aceb;" align="center" style="font:bold 16px/25px Arial, Helvetica, sans-serif; color:#888; padding:0 0 23px;">
                                                    Bonjour <b>{{ $data['prenom'] }}</b>, clique sur le lien suivant pour modifier ton mot de passe.
                                                    <br /> <br />

                                                    <a href="{{ route('reset_password', $data['id']) }}">Re-initialiser le mot de passe</a> 
                                                     
                                                    <br /> <br />
                                                    Se connecter à <a href="{{ route('login') }}">membres.msa.ci</a>.
                                                </td>
                                            </tr>
                                            
                                        </table>
                                    </td>
                                </tr>
                                <tr><td height="28"></td></tr>
                            </table>
                        </td>
                    </tr>
                </table>
                <tr>
                    <td style="line-height:0;"><div style="display:none; white-space:nowrap; font:15px/1px courier;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;</div></td>
                </tr>
            </table>
        </body>
    </html>