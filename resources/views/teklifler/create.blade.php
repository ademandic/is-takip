<x-app-layout>
    <div class="flex min-h-screen bg-gray-50">

        <x-isler.side-navbar :isler="$isler" />

        <main class="flex-1 p-6 bg-gray-100">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Yeni Teklif Ekle (İş No: {{ $isler->is_no }})</h1>

        <form method="POST" action="{{ route('isler.teklifler.store', $isler->id) }}" class="bg-white p-6 rounded-lg shadow space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Teklif No</label>
                <input type="text" name="teklif_no" required class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Açıklama</label>
                <textarea name="aciklama" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500"></textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tutar ($)</label>
                <input type="number" step="0.01" name="tutar" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alış Tutarı ($)</label>
                <input type="number" step="0.01" name="alis_tutar" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-6 py-2 rounded-md shadow-sm transition">
                    Kaydet
                </button>
            </div>
        </form>
        </main>
    </div>
</x-app-layout>