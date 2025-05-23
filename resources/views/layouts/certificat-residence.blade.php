<div dir="rtl" style="font-family: 'dejavu sans', sans-serif; text-align: right; padding: 30px; border: 1px solid #000;">
    <h2 style="text-align: center;">شهادة الإقامة</h2>

    <p>يشهد السيد رئيس الجماعة <strong>{{ $commune }}</strong> بأن:</p>

    <ul style="list-style: none; padding: 0;">
        <li>الإسم الكامل: <strong>{{ $nom }}</strong></li>
        <li>رقم البطاقة الوطنية: <strong>{{ $cin }}</strong></li>
        <li>تاريخ الإزدياد: <strong>{{ $date_naissance }}</strong></li>
        <li>اسم الأب: <strong>{{ $nom_pere }}</strong></li>
        <li>اسم الأم: <strong>{{ $nom_mere }}</strong></li>
        <li>العنوان: <strong>{{ $adresse }}</strong></li>
        <li>الجنسية: <strong>{{ $nationalite }}</strong></li>
        <li>المهنة: <strong>{{ $profession }}</strong></li>
        <li>الحالة العائلية: <strong>{{ $etat_civil }}</strong></li>
        <li>الغرض من الشهادة: <strong>{{ $motif }}</strong></li>
    </ul>

    <p>سلمت له هذه الشهادة للإدلاء بها عند الحاجة.</p>

    <p style="text-align: left;">حرر في: {{ $date_delivrance }}</p>

    <p style="text-align: left;">خاتم وتوقيع السيد الرئيس</p>
</div>
