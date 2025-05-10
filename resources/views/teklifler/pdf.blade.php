<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Teklif Formu</title>
    <style>
        @font-face {
            font-family: 'liberationsans';
            src: url('{{ resource_path("fonts/LiberationSans-Regular.ttf") }}') format('truetype');
        }
        body { font-family: notosans, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 5px; }
        .info-table, .offer-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15px;
        }
        .info-table th, .info-table td, .offer-table th, .offer-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .offer-table th {
            background-color: #f2f2f2;
        }
        .info-table th {
            font-weight:700;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
            margin-right: 40px;
        }

        .musteri-info-div
        {
            float:right;
            width:48%;
        }

        .firma-bilgi-div
        {
            float:left;
            width:48%;
            clear:left;
        }

        ul li{
            padding-bottom:2px;
        }

        fieldset legend
        {
            background: #f2f2f2;
        }
    </style>
</head>
<body>
    <div align="left">
        <img src="{{ public_path('storage/img/logo.svg') }}"  style="width: 100px; height: auto;"> 
    </div>
    <div class="header">
        <h1>TEKLIF FORMU</h1>
    </div>
    <div class="firma-bilgi-div">
        <table class="info-table"> 
            <tr>
                <td><strong>Hazirlayan:</strong> {{ 'Ozan Guzel' }}</td>
                <td><strong>Tarih:</strong> {{ date('d-m-Y', strtotime($teklif->created_at)) }}</td>
            </tr>
            <tr>
                <td colspan="2">
                  <span style="font-weight: 700"> {{ ENV('COMPANY_NAME') }} </span> <br />
                  <span> {{ ENV('COMPANY_ADDR') }} </span> <br />
                  <span style="font-weight: 700">Tel: </span> <span> {{ ENV('COMPANY_TEL') }} </span> <br />
                  <span style="font-weight: 700">E-mail: </span> <span> {{ ENV('COMPANY_EMAIL') }} </span> <br />
                </td>
            </tr>
        </table>
    </div>
    <div class="musteri-info-div">
        <table class="info-table" style="clear:right;"> 
            <tr>
                <td><strong>Unvan:</strong> {{ $isler->musteri->musteri_unvan }}</td>
            </tr>
            <tr>
                <td><strong>Ilgili Kisi:</strong> {{ $isler->musteri->ilgili_kisi }}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Adres:</strong> {{ $isler->musteri->adres }}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Ilgili Kisi E-Posta:</strong> {{ $isler->musteri->ilgili_kisi_email }}</td>
            </tr>
        </table>
    </div>
    <div style="clear:both"></div>
    <div>
        <table class="info-table">
        <tr>
            <th align="left">Odeme Sekli:</th>
            <td align="left">Pesin</td>
            <th align="left">Teslim Tarihi:</th>
            <td align="left">Resim onayindan sonra 4-5 hafta</td>
            <th align="left">Teklif Suresi:</th>
            <td align="left">25 Gun</td>
        </tr>
        </table>
    </div>
    <table class="offer-table">
        <thead>
            <tr>
                <th align="center" colspan="2">
                    Teklif Detaylari
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">
                    <fieldset style="border-color:#ddd; margin-bottom:10px;">
                        <legend>Sistem Detaylari</legend>
                        <ul style="list-style: none; padding:0; margin:0; padding:5px">
                            <li>Sistem Tipi: <strong>{{ $teknikdata->sistem_tipi }}</strong></li>
                            <li>Sogutma Burcu: <strong>{{ $teknikdata->sogutma_burcu }}</strong></li>
                            <li>Nozzle Adedi: <strong>{{ $teknikdata->nozzle_adedi }}</strong></li>
                            <li>Nozzle Capi: <strong>{{ $teknikdata->nozzle_capi }}</strong></li>
                            <li>Kalip Goz Adedi: <strong>{{ $teknikdata->kalip_goz_adedi }}</strong></li>
                            <li>Giris Capi: <strong>{{ $teknikdata->giris_capi }}</strong></li>
                            <li>SR: <strong>{{ $teknikdata->sr_alani }}</strong></li>
                        </ul>
                    </fieldset>
                    <fieldset style="border-color:#ddd;">
                        <legend>Parca Detaylari</legend>
                        <ul style="list-style: none; padding:0; margin:0; padding:5px">
                            <li>Parca Gramaji: <strong>{{ $teknikdata->parca_gramaji }}</strong></li>
                            <li>Parca Et Kalinligi: <strong>{{ $teknikdata->parca_et_kalinligi }}</strong></li>
                            <li>Malzeme Bilgisi: <strong>{{ $teknikdata->malzeme_bilgisi }}</strong></li>
                            <li>Parca Gorselligi: <strong>{{ $teknikdata->parca_gorselligi }}</strong></li>
                        </ul>
                    </fieldset>
                </td>
            </tr>
        </tbody>
        <tfoot>
            <tr>
                <td width="75%" align="right">Toplam (KDV Hariç):</td>
                <td style="text-align: right; background-color:lightyellow; font-weight:700; font-size:16px">${{ number_format($teklif->tutar, 2) }}</td>
            </tr>
        </tfoot>
    </table>
    <div>

        <table style="width:100%; left; font-size:10px; border:1px solid #ddd; padding:5px; margin-top:10px;">
            <tr>
                <td valign="top" style="width:49%;">
                    <div>
                        <strong style="font-weight: 600;">GARANTI SURELERI VE SARTLARI </strong><br />
                        <ul>
                            <li>Manifold ve Meme Govdeleri:</li><ul>
                            <li-Asindirici icermeyen malzemeler icin 2 yil</li> 
                            <li-Asindirici icerikli malzemeler icin 1 yil</li></ul></li>
                            <li>Rezistans ve Termokupllar: 1 Yil</li>
                            <li>Valvepin, PGB, Ana Giris Memesi, Gatebush ve Uclar:</li><ul>
                            <li-Asindirici icermeyen malzemeler icin 1 Yil</li>
                            <li-Asindirici icerikli malzemeler icin 6 Ay</li></ul>
                            <li>Tuketilen Parcalar(Orn: O-ring): 6 Ay</li>
                        </ul>
                    </div>
                </td>
                <td valign="top" style="width:49%;  border-left:1px solid #ddd;">
                    <div>
                        <strong style="font-weight: 600;">ODEME SARTLARI </strong><br />
                        <ul>
                            <li>KDV DAHIL TUTAR: <strong style="color:red">{{ number_format($teklif->tutar*1.2, 2) }} USD </strong></li>
                            <li>Faturalar <strong style="color:red">USD</strong> olarak duzenlenecektir, faturadaki kur <u>TCMB'deki doviz satis kuru</u> olacaktır</li>
                        </ul>

                        <strong style="font-weight: 600;">BANKA BILGILERI </strong><br />
                        <ul>
                            <li>QNB Bankasi (TL): <strong>TR41 0011 1000 0000 0154 9653 21</strong></li>
                            <li>Vakifbank (TL): <strong>TR30 0001 5001 5800 7355 3753 48</strong></li>
                        </ul>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="signature">
        <p><strong>Yetkili Imza</strong></p>
    </div>
</body>
</html>
<!--
            <tr>
                <td>{{ $teklif->teklif_no }}</td>
                <td>{{ $teklif->aciklama }}</td>
                <td>{{ number_format($teklif->tutar, 2) }}</td>
            </tr>
-->