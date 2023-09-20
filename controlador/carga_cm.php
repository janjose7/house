<?php

if ($tt19 != '' && $tt18 != '' && $tt17 != '' && $tt16 != '' && $tt15 != '' && $tt14 != '' && $tt13 != '' && $tt12 != '' && $tt11 != '' && $tt10 != '' && $tt9 != '' && $tt8 != '' && $tt7 != '' && $tt6 != '' && $tt5 != '' && $tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x19 != 0 && $x18 != 0 && $x17 != 0 && $x16 != 0 && $x15 != 0 && $x14 != 0 && $x13 != 0 && $x12 != 0 && $x11 != 0 && $x10 != 0 && $x9 != 0 && $x8 != 0 && $x7 != 0 && $x6 != 0 && $x5 != 0 && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt5) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x5, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x5_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt6) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x6, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x6_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt7) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x7, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x7_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt8) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x8, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x8_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt9) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x9, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x9_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt10) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x10, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x10_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt11) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x11, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x11_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt12) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x12, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x12_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt13) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x13, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x13_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt14) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x14, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x14_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt15) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x15, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x15_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt16) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x16, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x16_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt17) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x17, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x17_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt18) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x18, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x18_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt19) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x19, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x19_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt18 != '' && $tt17 != '' && $tt16 != '' && $tt15 != '' && $tt14 != '' && $tt13 != '' && $tt12 != '' && $tt11 != '' && $tt10 != '' && $tt9 != '' && $tt8 != '' && $tt7 != '' && $tt6 != '' && $tt5 != '' && $tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x18 != 0 && $x17 != 0 && $x16 != 0 && $x15 != 0 && $x14 != 0 && $x13 != 0 && $x12 != 0 && $x11 != 0 && $x10 != 0 && $x9 != 0 && $x8 != 0 && $x7 != 0 && $x6 != 0 && $x5 != 0 && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt5) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x5, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x5_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt6) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x6, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x6_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt7) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x7, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x7_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt8) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x8, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x8_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt9) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x9, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x9_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt10) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x10, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x10_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt11) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x11, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x11_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt12) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x12, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x12_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt13) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x13, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x13_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt14) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x14, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x14_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt15) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x15, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x15_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt16) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x16, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x16_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt17) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x17, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x17_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt18) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x18, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x18_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt17 != '' && $tt16 != '' && $tt15 != '' && $tt14 != '' && $tt13 != '' && $tt12 != '' && $tt11 != '' && $tt10 != '' && $tt9 != '' && $tt8 != '' && $tt7 != '' && $tt6 != '' && $tt5 != '' && $tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x17 != 0 && $x16 != 0 && $x15 != 0 && $x14 != 0 && $x13 != 0 && $x12 != 0 && $x11 != 0 && $x10 != 0 && $x9 != 0 && $x8 != 0 && $x7 != 0 && $x6 != 0 && $x5 != 0 && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt5) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x5, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x5_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt6) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x6, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x6_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt7) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x7, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x7_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt8) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x8, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x8_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt9) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x9, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x9_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt10) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x10, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x10_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt11) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x11, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x11_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt12) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x12, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x12_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt13) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x13, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x13_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt14) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x14, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x14_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt15) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x15, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x15_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt16) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x16, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x16_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt17) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x17, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x17_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt16 != '' && $tt15 != '' && $tt14 != '' && $tt13 != '' && $tt12 != '' && $tt11 != '' && $tt10 != '' && $tt9 != '' && $tt8 != '' && $tt7 != '' && $tt6 != '' && $tt5 != '' && $tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x16 != 0 && $x15 != 0 && $x14 != 0 && $x13 != 0 && $x12 != 0 && $x11 != 0 && $x10 != 0 && $x9 != 0 && $x8 != 0 && $x7 != 0 && $x6 != 0 && $x5 != 0 && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt5) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x5, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x5_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt6) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x6, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x6_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt7) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x7, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x7_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt8) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x8, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x8_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt9) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x9, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x9_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt10) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x10, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x10_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt11) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x11, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x11_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt12) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x12, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x12_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt13) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x13, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x13_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt14) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x14, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x14_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt15) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x15, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x15_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt16) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x16, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x16_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt15 != '' && $tt14 != '' && $tt13 != '' && $tt12 != '' && $tt11 != '' && $tt10 != '' && $tt9 != '' && $tt8 != '' && $tt7 != '' && $tt6 != '' && $tt5 != '' && $tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x15 != 0 && $x14 != 0 && $x13 != 0 && $x12 != 0 && $x11 != 0 && $x10 != 0 && $x9 != 0 && $x8 != 0 && $x7 != 0 && $x6 != 0 && $x5 != 0 && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt5) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x5, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x5_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt6) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x6, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x6_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt7) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x7, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x7_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt8) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x8, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x8_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt9) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x9, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x9_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt10) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x10, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x10_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt11) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x11, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x11_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt12) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x12, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x12_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt13) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x13, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x13_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt14) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x14, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x14_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt15) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x15, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x15_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt14 != '' && $tt13 != '' && $tt12 != '' && $tt11 != '' && $tt10 != '' && $tt9 != '' && $tt8 != '' && $tt7 != '' && $tt6 != '' && $tt5 != '' && $tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x14 != 0 && $x13 != 0 && $x12 != 0 && $x11 != 0 && $x10 != 0 && $x9 != 0 && $x8 != 0 && $x7 != 0 && $x6 != 0 && $x5 != 0 && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt5) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x5, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x5_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt6) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x6, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x6_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt7) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x7, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x7_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt8) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x8, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x8_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt9) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x9, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x9_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt10) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x10, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x10_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt11) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x11, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x11_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt12) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x12, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x12_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt13) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x13, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x13_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt14) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x14, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x14_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt13 != '' && $tt12 != '' && $tt11 != '' && $tt10 != '' && $tt9 != '' && $tt8 != '' && $tt7 != '' && $tt6 != '' && $tt5 != '' && $tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x13 != 0 && $x12 != 0 && $x11 != 0 && $x10 != 0 && $x9 != 0 && $x8 != 0 && $x7 != 0 && $x6 != 0 && $x5 != 0 && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt5) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x5, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x5_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt6) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x6, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x6_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt7) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x7, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x7_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt8) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x8, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x8_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt9) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x9, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x9_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt10) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x10, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x10_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt11) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x11, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x11_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt12) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x12, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x12_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt13) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x13, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x13_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt12 != '' && $tt11 != '' && $tt10 != '' && $tt9 != '' && $tt8 != '' && $tt7 != '' && $tt6 != '' && $tt5 != '' && $tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x12 != 0 && $x11 != 0 && $x10 != 0 && $x9 != 0 && $x8 != 0 && $x7 != 0 && $x6 != 0 && $x5 != 0 && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt5) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x5, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x5_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt6) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x6, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x6_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt7) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x7, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x7_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt8) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x8, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x8_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt9) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x9, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x9_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt10) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x10, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x10_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt11) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x11, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x11_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt12) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x12, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x12_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt11 != '' && $tt10 != '' && $tt9 != '' && $tt8 != '' && $tt7 != '' && $tt6 != '' && $tt5 != '' && $tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x11 != 0 && $x10 != 0 && $x9 != 0 && $x8 != 0 && $x7 != 0 && $x6 != 0 && $x5 != 0 && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt5) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x5, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x5_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt6) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x6, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x6_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt7) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x7, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x7_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt8) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x8, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x8_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt9) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x9, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x9_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt10) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x10, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x10_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt11) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x11, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x11_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt10 != '' && $tt9 != '' && $tt8 != '' && $tt7 != '' && $tt6 != '' && $tt5 != '' && $tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x10 != 0 && $x9 != 0 && $x8 != 0 && $x7 != 0 && $x6 != 0 && $x5 != 0 && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                    <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                        <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                        Oficina Virtual<br>
                        Codigo: $crypto</p>
                    </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt5) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x5, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x5_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt6) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x6, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x6_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt7) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x7, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x7_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt8) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x8, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x8_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt9) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x9, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x9_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt10) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x10, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x10_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt9 != '' && $tt8 != '' && $tt7 != '' && $tt6 != '' && $tt5 != '' && $tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x9 != 0 && $x8 != 0 && $x7 != 0 && $x6 != 0 && $x5 != 0 && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                    <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                        <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                        Oficina Virtual<br>
                        Codigo: $crypto</p>
                    </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt5) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x5, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x5_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt6) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x6, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x6_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt7) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x7, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x7_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt8) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x8, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x8_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt9) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x9, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x9_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt8 != '' && $tt7 != '' && $tt6 != '' && $tt5 != '' && $tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x8 != 0 && $x7 != 0 && $x6 != 0 && $x5 != 0 && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt5) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x5, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x5_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt6) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x6, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x6_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt7) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x7, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x7_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt8) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x8, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x8_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt7 != '' && $tt6 != '' && $tt5 != '' && $tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x7 != 0 && $x6 != 0 && $x5 != 0 && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt5) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x5, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x5_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt6) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x6, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x6_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt7) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x7, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x7_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt6 != '' && $tt5 != '' && $tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x6 != 0 && $x5 != 0 && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt5) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x5, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x5_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt6) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x6, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x6_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt5 != '' && $tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x5 != 0 && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt5) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x5, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x5_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt4 != '' && $tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x4 != 0 && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt2) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x2, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x2_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt3) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x3, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x3_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt4) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    " . number_format($x4, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x4_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt3 != '' && $tt2 != '' && $tt1 != '' && $tt0 != '' && $x3 != 0 && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
            <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                    <p>Relacion de Gastos</p>
                </td>
                <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                    <p>Comunes</p>
                </td>
                <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                    <p>No Comunes</p>
                </td>
                <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                    <p>Alicuota</p>
                </td>
            </tr>
            <tr>
                <td style='padding: 3px;  text-align: left'>
                    " . ucwords($tt0) . "
                </td>
                <td style='padding: 3px; text-align: right'>
                    " . number_format($x0, 2, ',', '.') . "
                </td>
                <td style='padding: 3px; text-align: right'>
                </td>
                <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x0_d, 2, ',', '.') . "
                </td>
            </tr>
            <tr>
                <td style='padding: 3px; text-align: left'>
                    " . ucwords($tt1) . "
                </td>
                <td style='padding: 3px; text-align: right'>
                    " . number_format($x1, 2, ',', '.') . "
                </td>
                <td style='padding: 3px; text-align: right'>
                </td>
                <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x1_d, 2, ',', '.') . "
                </td>
            </tr>
            <tr>
                <td style='padding: 3px; text-align: left'>
                    " . ucwords($tt2) . "
                </td>
                <td style='padding: 3px; text-align: right'>
                " . number_format($x2, 2, ',', '.') . "
                </td>
                <td style='padding: 3px; text-align: right'>
                </td>
                <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                " . number_format($x2_d, 2, ',', '.') . "
                </td>
            </tr>
            <tr>
                <td style='padding: 3px; text-align: left'>
                    " . ucwords($tt3) . "
                </td>
                <td style='padding: 3px; text-align: right'>
                " . number_format($x3, 2, ',', '.') . "
                </td>
                <td style='padding: 3px; text-align: right'>
                </td>
                <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                " . number_format($x3_d, 2, ',', '.') . "
                </td>
            </tr>
            <tr>
                <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                    Sub-Total del Mes
                </td>
                <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    " . number_format($op_sum, 2, ',', '.') . "
                </td>
                <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                </td>
                <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($sum_pro, 2, ',', '.') . "
                </td>
            </tr>
            <tr>
                <td style='padding: 2px; text-align: center'>
                    10% Fondo de Reserva
                </td>
                <td style='padding: 2px; text-align: right'>
                    " . number_format($op_res, 2, ',', '.') . "
                </td>
                <td style='padding: 5px; text-align: right'>
                </td>
                <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($res_pro, 2, ',', '.') . "
                </td>
            </tr>
            <tr>
                <td style='padding: 2px; text-align: center'>
                    Fondo de Prestaciones
                </td>
                <td style='padding: 2px; text-align: right'>
                    " . number_format($op_fdp, 2, ',', '.') . "
                </td>
                <td style='padding: 5px; text-align: right'>
                </td>
                <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($fdp_pro, 2, ',', '.') . "
                </td>
            </tr>
            <tr>
                <td style='padding: 2px; text-align: center;'>
                    4% Servicio del Software
                </td>
                <td style='padding: 2px; text-align: right;'>
                    " . number_format($op_sof, 2, ',', '.') . "
                </td>
                <td style='padding: 5px; text-align: right;'>
                </td>
                <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($sof_pro, 2, ',', '.') . "
                </td>
            </tr>
            <tr style='font-weight: bold;'>
                <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                    Total a Pagar
                </td>
                <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    " . number_format($op_total, 2, ',', '.') . "
                </td>
                <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                </td>
                <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                    " . number_format($op_pro, 2, ',', '.') . "
                </td>
            </tr>
        </table>
        <br>
        <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
            <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                <td style='padding: 3px'>Alicuota</td>
                <td style='padding: 3px'>Alicuota REF</td>
                <td style='padding: 3px'>Total a Pagar</td>
                <td style='padding: 3px'>Total a Pagar REF</td>
            </tr>
            <tr style='background-color: #ddd; color: #000;'>
                <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
            </tr>
        </table>
        <br>
        <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
            <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                <td style='padding: 3px'>Resumen de Fondos</td>
                <td style='padding: 3px'>Saldo Anterior</td>
                <td style='padding: 3px'>Ingresos Aprox</td>
                <td style='padding: 3px'>Egresos Aprox</td>
                <td style='padding: 3px'>Saldo Aprox</td>
            </tr>
            <tr style='background-color: #ddd; color: #000;'>
                <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
            </tr>
            <tr style='background-color: #eeeeee; color: #000;'>
                <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
            </tr>
        </table>
        <div>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
            <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
            <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
        </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt2 != '' && $tt1 != '' && $tt0 != '' && $x2 != 0 && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                    <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                    <p style='margin: 0 0 0.25em;''>$direccion</p>
                    <p style='margin: 0 0 0.25em;'>$rif</p>
                </address>
            </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
        <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
            <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                    <p>Relacion de Gastos</p>
                </td>
                <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                    <p>Comunes</p>
                </td>
                <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                    <p>No Comunes</p>
                </td>
                <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                    <p>Alicuota</p>
                </td>
            </tr>
            <tr>
                <td style='padding: 3px;  text-align: left'>
                    " . ucwords($tt0) . "
                </td>
                <td style='padding: 3px; text-align: right'>
                    " . number_format($x0, 2, ',', '.') . "
                </td>
                <td style='padding: 3px; text-align: right'>
                </td>
                <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x0_d, 2, ',', '.') . "
                </td>
            </tr>
            <tr>
                <td style='padding: 3px; text-align: left'>
                    " . ucwords($tt1) . "
                </td>
                <td style='padding: 3px; text-align: right'>
                    " . number_format($x1, 2, ',', '.') . "
                </td>
                <td style='padding: 3px; text-align: right'>
                </td>
                <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($x1_d, 2, ',', '.') . "
                </td>
            </tr>
            <tr>
                <td style='padding: 3px; text-align: left'>
                    " . ucwords($tt2) . "
                </td>
                <td style='padding: 3px; text-align: right'>
                " . number_format($x2, 2, ',', '.') . "
                </td>
                <td style='padding: 3px; text-align: right'>
                </td>
                <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                " . number_format($x2_d, 2, ',', '.') . "
                </td>
            </tr>
            <tr>
                <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                    Sub-Total del Mes
                </td>
                <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    " . number_format($op_sum, 2, ',', '.') . "
                </td>
                <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                </td>
                <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($sum_pro, 2, ',', '.') . "
                </td>
            </tr>
            <tr>
                <td style='padding: 2px; text-align: center'>
                    10% Fondo de Reserva
                </td>
                <td style='padding: 2px; text-align: right'>
                    " . number_format($op_res, 2, ',', '.') . "
                </td>
                <td style='padding: 5px; text-align: right'>
                </td>
                <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($res_pro, 2, ',', '.') . "
                </td>
            </tr>
            <tr>
                <td style='padding: 2px; text-align: center'>
                    Fondo de Prestaciones
                </td>
                <td style='padding: 2px; text-align: right'>
                    " . number_format($op_fdp, 2, ',', '.') . "
                </td>
                <td style='padding: 5px; text-align: right'>
                </td>
                <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($fdp_pro, 2, ',', '.') . "
                </td>
            </tr>
            <tr>
                <td style='padding: 2px; text-align: center;'>
                    4% Servicio del Software
                </td>
                <td style='padding: 2px; text-align: right;'>
                    " . number_format($op_sof, 2, ',', '.') . "
                </td>
                <td style='padding: 5px; text-align: right;'>
                </td>
                <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                    " . number_format($sof_pro, 2, ',', '.') . "
                </td>
            </tr>
            <tr style='font-weight: bold;'>
                <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                    Total a Pagar
                </td>
                <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    " . number_format($op_total, 2, ',', '.') . "
                </td>
                <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                </td>
                <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                    " . number_format($op_pro, 2, ',', '.') . "
                </td>
            </tr>
        </table>
        <br>
        <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
            <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                <td style='padding: 3px'>Alicuota</td>
                <td style='padding: 3px'>Alicuota REF</td>
                <td style='padding: 3px'>Total a Pagar</td>
                <td style='padding: 3px'>Total a Pagar REF</td>
            </tr>
            <tr style='background-color: #ddd; color: #000;'>
                <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
            </tr>
        </table>
        <br>
        <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
            <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                <td style='padding: 3px'>Resumen de Fondos</td>
                <td style='padding: 3px'>Saldo Anterior</td>
                <td style='padding: 3px'>Ingresos Aprox</td>
                <td style='padding: 3px'>Egresos Aprox</td>
                <td style='padding: 3px'>Saldo Aprox</td>
            </tr>
            <tr style='background-color: #ddd; color: #000;'>
                <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
            </tr>
            <tr style='background-color: #eeeeee; color: #000;'>
                <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
            </tr>
        </table>
        <div>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
            <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
            <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
        </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt1 != '' && $tt0 != '' && $x1 != 0 && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
                <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
                    <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                        <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                        <p style='margin: 0 0 0.25em;''>$direccion</p>
                        <p style='margin: 0 0 0.25em;'>$rif</p>
                    </address>
                </header>
            <article style='margin: 0 auto; clear: both'>
            <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0;''>Recibo</h1>
                <div style='margin: 0 auto; font-weight: bold; width: 94%;  font-size: 90%;'>
                    <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                    Oficina Virtual<br>
                    Codigo: $crypto</p>
                </div>
            </article>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                    <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Relacion de Gastos</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>No Comunes</p>
                    </td>
                    <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                        <p>Alicuota</p>
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px;  text-align: left'>
                        " . ucwords($tt0) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x0, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x0_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 3px; text-align: left'>
                        " . ucwords($tt1) . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                        " . number_format($x1, 2, ',', '.') . "
                    </td>
                    <td style='padding: 3px; text-align: right'>
                    </td>
                    <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($x1_d, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                        Sub-Total del Mes
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                        " . number_format($op_sum, 2, ',', '.') . "
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                    </td>
                    <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sum_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        10% Fondo de Reserva
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_res, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($res_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center'>
                        Fondo de Prestaciones
                    </td>
                    <td style='padding: 2px; text-align: right'>
                        " . number_format($op_fdp, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($fdp_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr>
                    <td style='padding: 2px; text-align: center;'>
                        4% Servicio del Software
                    </td>
                    <td style='padding: 2px; text-align: right;'>
                        " . number_format($op_sof, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; text-align: right;'>
                    </td>
                    <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                        " . number_format($sof_pro, 2, ',', '.') . "
                    </td>
                </tr>
                <tr style='font-weight: bold;'>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                        Total a Pagar
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                        " . number_format($op_total, 2, ',', '.') . "
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                    </td>
                    <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                        " . number_format($op_pro, 2, ',', '.') . "
                    </td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Alicuota</td>
                    <td style='padding: 3px'>Alicuota REF</td>
                    <td style='padding: 3px'>Total a Pagar</td>
                    <td style='padding: 3px'>Total a Pagar REF</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                    <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                </tr>
            </table>
            <br>
            <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                    <td style='padding: 3px'>Resumen de Fondos</td>
                    <td style='padding: 3px'>Saldo Anterior</td>
                    <td style='padding: 3px'>Ingresos Aprox</td>
                    <td style='padding: 3px'>Egresos Aprox</td>
                    <td style='padding: 3px'>Saldo Aprox</td>
                </tr>
                <tr style='background-color: #ddd; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                </tr>
                <tr style='background-color: #eeeeee; color: #000;'>
                    <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                    <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                </tr>
            </table>
            <div>
                <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                    <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                <p>Oxe<span style='color:#58ec00'>Rev</span>&copy</p>
            </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;
    

    
    
    

} elseif ($tt0 != '' && $x0 != 0) {
    $a4 = " <html style='font-size: 15px 'Open Sans', sans-serif; overflow: auto; padding: 0.5in; cursor: default;'>
            <head>
                <link href='https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i' rel='stylesheet'>
                <style>
                    *{
                        border: 0;
                        box-sizing: content-box;
                        color: inherit;
                        font-family: inherit;
                        font-size: inherit;
                        font-style: inherit;
                        font-weight: inherit;
                        line-height: inherit;
                        list-style: none;
                        margin: 0;
                        padding: 0;
                        text-decoration: none;
                        vertical-align: top;
                    }
                </style>
            </head>
            <header style='margin: 0'>
            <p style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; background: rgb(17, 127, 90); border-radius: 0.25em; color: #FFF; margin: 0 auto; padding: 0.5em 0; width: 94%;'> $crypto</p>
            <address style='text-align: left; font-size: 90%; font-style: normal; line-height: 1.1; margin: 0 auto; width: 94%; font-size: 85%;'>
                <p style='margin: 0 0 0.25em;'>$resident $nombre</p>
                <p style='margin: 0 0 0.25em;''>$direccion</p>
                <p style='margin: 0 0 0.25em;'>$rif</p>
            </address>
            </header>
                    <article style='margin: 0 auto; clear: both'>
                    <h1 style='font: bold 100% sans-serif; letter-spacing: 0.5em; text-align: center; text-transform: uppercase; margin: 0; padding-top: 0.7em'>Recibo</h1>
                        <div style='margin: 0 auto; font-weight: bold; width: 94%; font-size: 90%;'>
                            <p>Administrador: " . $_SESSION['rev_conectado'] . "<br>
                            Oficina Virtual<br>
                            Codigo:  $crypto</p>
                        </div>
                    </article>
                    <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%'>
                        <tr style='background-color: rgb(17, 127, 90); color: #ffffff'>
                            <td style='border-bottom: 1px solid; border-left: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                                <p>Relacion de Gastos</p>
                            </td>
                            <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                                <p>Comunes</p>
                            </td>
                            <td style='border-bottom: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                                <p>No Comunes</p>
                            </td>
                            <td style='border-bottom: 1px solid; border-right: 1px solid; border-top: 1px solid; text-align: center; padding: 5px; text-transform: uppercase; font-weight: bold'>
                                <p>Alicuota</p>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding: 3px;  text-align: left'>
                                " . ucwords($tt0) . "
                            </td>
                            <td style='padding: 3px; text-align: right'>
                                " . number_format($x0, 2, ',', '.') . "
                            </td>
                            <td style='padding: 3px; text-align: right'>
                            </td>
                            <td style='padding: 3px; text-align: right; background-color: #cbfeeb;'>
                                " . number_format($x0_d, 2, ',', '.') . "
                            </td>
                        </tr>
                        <tr>
                            <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: center'>
                                Sub-Total del Mes
                            </td>
                            <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                                " . number_format($op_sum, 2, ',', '.') . "
                            </td>
                            <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right'>
                            </td>
                            <td style='border-top: 1px solid #bbbbbb; padding: 2px; text-align: right; background-color: #cbfeeb;'>
                                " . number_format($sum_pro, 2, ',', '.') . "
                            </td>
                        </tr>
                        <tr>
                            <td style='padding: 2px; text-align: center'>
                                10% Fondo de Reserva
                            </td>
                            <td style='padding: 2px; text-align: right'>
                                " . number_format($op_res, 2, ',', '.') . "
                            </td>
                            <td style='padding: 5px; text-align: right'>
                            </td>
                            <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                                " . number_format($res_pro, 2, ',', '.') . "
                            </td>
                        </tr>
                        <tr>
                            <td style='padding: 2px; text-align: center'>
                                Fondo de Prestaciones
                            </td>
                            <td style='padding: 2px; text-align: right'>
                                " . number_format($op_fdp, 2, ',', '.') . "
                            </td>
                            <td style='padding: 5px; text-align: right'>
                            </td>
                            <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                                " . number_format($fdp_pro, 2, ',', '.') . "
                            </td>
                        </tr>
                        <tr>
                            <td style='padding: 2px; text-align: center;'>
                                4% Servicio del Software
                            </td>
                            <td style='padding: 2px; text-align: right;'>
                                " . number_format($op_sof, 2, ',', '.') . "
                            </td>
                            <td style='padding: 5px; text-align: right;'>
                            </td>
                            <td style='padding: 2px; text-align: right; background-color: #cbfeeb;'>
                                " . number_format($sof_pro, 2, ',', '.') . "
                            </td>
                        </tr>
                        <tr style='font-weight: bold;'>
                            <td style='padding: 5px; background-color: #ddd; color: #000; text-align: center; text-transform: uppercase; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;  border-left: 1px solid #bbbbbb;'>
                                Total a Pagar
                            </td>
                            <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                                " . number_format($op_total, 2, ',', '.') . "
                            </td>
                            <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb;'>
                            </td>
                            <td style='padding: 5px; background-color: #ddd; color: #000; text-align: right; border-bottom: 1px solid #bbbbbb;  border-top: 1px solid #bbbbbb; border-right: 1px solid #bbbbbb;'>
                                " . number_format($op_pro, 2, ',', '.') . "
                            </td>
                        </tr>
                    </table>
                    <br>
                    <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                        <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                            <td style='padding: 3px'>Alicuota</td>
                            <td style='padding: 3px'>Alicuota REF</td>
                            <td style='padding: 3px'>Total a Pagar</td>
                            <td style='padding: 3px'>Total a Pagar REF</td>
                        </tr>
                        <tr style='background-color: #ddd; color: #000;'>
                            <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                            <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                            <td style='padding: 3px; font-weight: bold;'>" . number_format($op_pro, 2, ',', '.') .  "</td>
                            <td style='padding: 3px; font-weight: bold;'>" . number_format($ali_pro, 2, ',', '.') .  "</td>
                        </tr>
                    </table>
                    <br>
                    <table style='border-collapse: collapse; margin: 0 auto; margin-left: auto; margin-right: auto; width: 94%;  text-align: center;'>
                        <tr style='background-color: #04aa6d; color: #fff; font-weight: bold;'>
                            <td style='padding: 3px'>Resumen de Fondos</td>
                            <td style='padding: 3px'>Saldo Anterior</td>
                            <td style='padding: 3px'>Ingresos Aprox</td>
                            <td style='padding: 3px'>Egresos Aprox</td>
                            <td style='padding: 3px'>Saldo Aprox</td>
                        </tr>
                        <tr style='background-color: #ddd; color: #000;'>
                            <td style='font-weight: bold; padding: 3px'>" . $res_nomb . "</td>
                            <td style='padding: 3px'>" . number_format($res_mont, 2, ',', '.') . "</td>
                            <td style='padding: 3px'>" . number_format($op_res_bs, 2, ',', '.') . "</td>
                            <td style='padding: 3px'>" . number_format($egs_rsv, 2, ',', '.') . "</td>
                            <td style='padding: 3px'>" . number_format($res_total, 2, ',', '.') . "</td>
                        </tr>
                        <tr style='background-color: #eeeeee; color: #000;'>
                            <td style='font-weight: bold; padding: 3px'>" . $fdp_nomb . "</td>
                            <td style='padding: 3px'>" . number_format($fdp_mont, 2, ',', '.') . "</td>
                            <td style='padding: 3px'>" . number_format($op_fdp_bs, 2, ',', '.') . "</td>
                            <td style='padding: 3px'>" . number_format($egs_pst, 2, ',', '.') . "</td>
                            <td style='padding: 3px'>" . number_format($fdp_total, 2, ',', '.') . "</td>
                        </tr>
                    </table>
                    <div>
                        <h1 style='font: bold 100% sans-serif; letter-spacing: 0.4em; text-align: center; text-transform: uppercase; border: none; border-width: 0 0 1px; border-color: #999; border-bottom-style: solid; margin: 0 auto; padding: .5em; width: 92%'>Nota Adicional</h1>
                            <p style='text-align: center; margin: 3px auto'>" . fechaTraducida($fecha) . "</p>
                        <span style='text-align: center; font-size: 70%; line-height: .25; font-weight: bold;'>
                        <p>Oxe<span style='color:#58ec00'>Rev</span>©</p>
                    </span></div>";

    $_SESSION['a4'] = $a4;
    $_SESSION['recibo'] = true;

}

    $contador_nc = $conn->prepare("SELECT COUNT(DISTINCT vivienda_scs0_rev) FROM usuarios_scs0_oxerev WHERE rol_scs0_rev = 2 AND correo_scs0_rev != '' AND vivienda_scs0_rev LIKE '$edif_nc%'");
    $contador_nc->execute();

    $contador_c = $conn->prepare("SELECT COUNT(DISTINCT vivienda_scs0_rev) FROM usuarios_scs0_oxerev WHERE rol_scs0_rev = 2 AND correo_scs0_rev != '' AND vivienda_scs0_rev NOT LIKE '$edif_nc%'");
    $contador_c->execute();

?>
