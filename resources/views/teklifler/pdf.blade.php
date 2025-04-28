<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Teklif Formu</title>
    <style>
        body { font-family: DejaVu Sans, sans-serif; font-size: 12px; }
        .header { text-align: center; margin-bottom: 30px; }
        .info-table, .offer-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        .info-table td, .offer-table th, .offer-table td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .offer-table th {
            background-color: #f2f2f2;
        }
        .signature {
            margin-top: 50px;
            text-align: right;
            margin-right: 40px;
        }
    </style>
</head>
<body>

    <div class="header">
        <h2>TEKLİF FORMU</h2>
        <h4>Şirket Adı</h4> <!-- İstersen burayı dinamik de yaparız -->
    </div>

    <table class="info-table">
        <tr>
            <td><strong>Müşteri Adı:</strong> {{ $isler->musteri->ad }}</td>
            <td><strong>Ünvan:</strong> {{ $isler->musteri->musteri_unvan }}</td>
        </tr>
        <tr>
            <td><strong>Tipi:</strong> {{ $isler->musteri->tipi }}</td>
            <td><strong>İlgili Kişi:</strong> {{ $isler->musteri->ilgili_kisi }}</td>
        </tr>
        <tr>
            <td colspan="2"><strong>Adres:</strong> {{ $isler->musteri->adres }}</td>
        </tr>
        <tr>
            <td colspan="2"><strong>İlgili Kişi E-Posta:</strong> {{ $isler->musteri->ilgili_kisi_email }}</td>
        </tr>
    </table>

    <table class="offer-table">
        <thead>
            <tr>
                <th>Teklif No</th>
                <th>Açıklama</th>
                <th>Tutar ($)</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>{{ $teklif->teklif_no }}</td>
                <td>{{ $teklif->aciklama }}</td>
                <td>{{ number_format($teklif->tutar, 2) }}</td>
            </tr>
        </tbody>
    </table>

    <div class="signature">
        <p><strong>Yetkili İmza</strong></p>
    </div>

</body>
</html>