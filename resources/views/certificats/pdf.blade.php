<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <title>شهادة السكنى</title>
    <style>
        @font-face {
            font-family: 'Amiri';
            src: url('{{ public_path('fonts/Amiri-Regular.ttf') }}') format('truetype');
        }

        body {
            font-family: 'Amiri', sans-serif;
            direction: rtl;
            text-align: right;
            font-size: 16px;
            margin: 0;
        }

        .page {
            width: 100%;
            height: 100%;
            padding: 20px;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }

        .certificat {
            border: 1px dashed #000;
            padding: 20px;
            height: 48%;
            margin-bottom: 2%;
        }

        .certificat:last-child {
            margin-bottom: 0;
        }
    </style>
</head>
<body>
    <div class="page">
        <div class="certificat">
            <h3>شهادة السكنى</h3>
            <p>أنا الموقع أسفله {{ $certificat1->agent }} ...</p>
            <p>الاسم الكامل: {{ $certificat1->nom }} {{ $certificat1->prenom }}</p>
            <p>رقم البطاقة الوطنية: {{ $certificat1->cin }}</p>
            <p>تاريخ الازدياد: {{ $certificat1->date_naissance }}</p>
            <p>العنوان: {{ $certificat1->adresse }}</p>
            <p>حرر في {{ now()->format('Y/m/d') }}</p>
        </div>

        <div class="certificat">
            <h3>شهادة السكنى</h3>
            <p>أنا الموقع أسفله {{ $certificat2->agent }} ...</p>
            <p>الاسم الكامل: {{ $certificat2->nom }} {{ $certificat2->prenom }}</p>
            <p>رقم البطاقة الوطنية: {{ $certificat2->cin }}</p>
            <p>تاريخ الازدياد: {{ $certificat2->date_naissance }}</p>
            <p>العنوان: {{ $certificat2->adresse }}</p>
            <p>حرر في {{ now()->format('Y/m/d') }}</p>
        </div>
    </div>
</body>
</html>
