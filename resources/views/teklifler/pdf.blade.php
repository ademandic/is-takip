<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Teklif Formu</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 5px; }
        .info-table, .offer-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
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
    <div class="header">
        <h3 style="margin:0; padding:0;"><!--<img style="width:30%;" src="{{ public_path('storage/img/logo_temp.jpeg') }}">-->UNIWAY HOT SOLUTIONS</h3> <!-- İstersen burayı dinamik de yaparız -->
        <h1>TEKLİF FORMU</h1>
    </div>
    <div class="firma-bilgi-div">
        <table class="info-table"> 
            <tr>
                <td><strong>Hazırlayan:</strong> {{ 'Ozan Güzel' }}</td>
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
        <table class="info-table"> 
            <tr>
                <td><strong>Ünvan:</strong> {{ $isler->musteri->musteri_unvan }}</td>
            </tr>
            <tr>
                <td><strong>İlgili Kişi:</strong> {{ $isler->musteri->ilgili_kisi }}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>Adres:</strong> {{ $isler->musteri->adres }}</td>
            </tr>
            <tr>
                <td colspan="2"><strong>İlgili Kişi E-Posta:</strong> {{ $isler->musteri->ilgili_kisi_email }}</td>
            </tr>
        </table>
    </div>
    <div style="clear:both"></div>
    <div>
        <table class="info-table">
        <tr>
            <th align="left">Ödeme Şekli:</th>
            <td align="left">Peşin</td>
            <th align="left">Teslim Tarihi:</th>
            <td align="left">Resim onayından sonra 4-5 hafta</td>
            <th align="left">Teklif Süresi:</th>
            <td align="left">25 Gün</td>
        </tr>
        </table>
    </div>
    <table class="offer-table">
        <thead>
            <tr>
                <th align="center" colspan="2">
                    Teklif Detayları
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td colspan="2">
                    <fieldset style="border-color:#ddd; margin-bottom:10px;">
                        <legend>Sistem Detayları</legend>
                        <ul style="list-style: none; padding:0; margin:0; padding:5px">
                            <li>Sistem Tipi: <strong>{{ $teknikdata->sistem_tipi }}</strong></li>
                            <li>Soğutma Burcu: <strong>{{ $teknikdata->sogutma_burcu }}</strong></li>
                            <li>Nozzle Adedi: <strong>{{ $teknikdata->nozzle_adedi }}</strong></li>
                            <li>Kalıp Göz Adedi: <strong>{{ $teknikdata->kalip_goz_adedi }}</strong></li>
                            <li>Giriş Çapı: <strong>{{ $teknikdata->giris_capi }}</strong></li>
                            <li>SR: <strong>{{ $teknikdata->sr_alani }}</strong></li>
                        </ul>
                    </fieldset>
                    <fieldset style="border-color:#ddd;">
                        <legend>Parça Detayları</legend>
                        <ul style="list-style: none; padding:0; margin:0; padding:5px">
                            <li>Parça Gramajı: <strong>{{ $teknikdata->parca_gramaji }}</strong></li>
                            <li>Parça Et Kalınlığı: <strong>{{ $teknikdata->parca_et_kalinligi }}</strong></li>
                            <li>Malzeme Bilgisi: <strong>{{ $teknikdata->malzeme_bilgisi }}</strong></li>
                            <li>Parça Görselliği: <strong>{{ $teknikdata->parca_gorselligi }}</strong></li>
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
                            <li>Manifold ve Meme Gövdeleri:</li><ul>
                            <li>Aşındırıcı içermeyen malzemeler için 2 yıl</li> 
                            <li>Aşındırıcı içerikli malzemeler için 1 yıl</li></ul></li>
                            <li>Rezistans ve Termokupllar: 1 Yıl</li>
                            <li>Valvepin, PGB, Ana Giriş Memesi, Gatebush ve Uçlar:</li><ul>
                            <li>Aşındırıcı içermeyen malzemeler için 1 Yıl</li>
                            <li>Aşındırıcı içerikli malzemeler için 6 Ay</li></ul>
                            <li>Tüketilen Parçalar(Örn: O-ring): 6 Ay</li>
                        </ul>
                    </div>
                </td>
                <td valign="top" style="width:49%;  border-left:1px solid #ddd;">
                    <div>
                        <strong style="font-weight: 600;">ÖDEME SARTLARI </strong><br />
                        <ul>
                            <li>KDV DAHİL TUTAR: <strong style="color:red">{{ number_format($teklif->tutar*1.2, 2) }} USD </strong></li>
                            <li>Faturalar <strong style="color:red">USD</strong> olarak düzenlenecektir, faturadaki kur <u>TCMB'deki döviz satış kuru</u> olacaktır</li>
                        </ul>

                        <strong style="font-weight: 600;">BANKA BILGILERI </strong><br />
                        <ul>
                            <li>QNB Bankası (TL): <strong>TR41 0011 1000 0000 0154 9653 21</strong></li>
                            <li>Vakıfbank (TL): <strong>TR30 0001 5001 5800 7355 3753 48</strong></li>
                        </ul>
                        </ul>
                    </div>
                </td>
            </tr>
        </table>
    </div>
    <div class="signature">
        <p><strong>Yetkili İmza</strong></p>
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