<x-app-layout>
<div class="max-w-4xl mx-auto p-6 bg-white rounded-xl shadow-md mt-8">
    <h2 class="text-2xl font-bold mb-6 text-center text-gray-700">إنشاء شهادة السكنى</h2>

    <form action="{{ route('certificats.store') }}" method="POST" class="space-y-4">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="nom" class="block text-sm font-medium text-gray-700">الاسم العائلي</label>
                <input type="text" name="nom" id="nom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label for="prenom" class="block text-sm font-medium text-gray-700">الاسم الشخصي</label>
                <input type="text" name="prenom" id="prenom" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label for="cin" class="block text-sm font-medium text-gray-700">رقم البطاقة الوطنية</label>
                <input type="text" name="cin" id="cin" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>

            <div>
                <label for="date_naissance" class="block text-sm font-medium text-gray-700">تاريخ الازدياد</label>
                <input type="date" name="date_naissance" id="date_naissance" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
            </div>
        </div>

        <div>
            <label for="adresse" class="block text-sm font-medium text-gray-700">العنوان</label>
            <input type="text" name="adresse" id="adresse" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:ring-blue-500 focus:border-blue-500" required>
        </div>

        <div class="text-center">
            <button type="submit" class="inline-flex items-center px-6 py-2 bg-blue-600 text-white text-sm font-medium rounded-md shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                إنشاء الشهادة
            </button>
        </div>
    </form>
</div>
</x-app-layout>
