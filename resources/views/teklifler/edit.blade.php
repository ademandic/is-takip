<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Teklif Düzenle (İş No: {{ $isler->is_no }})</h1>

        <form method="POST" action="{{ route('isler.teklifler.update', ['isler' => $isler, 'teklif' => $teklif]) }}" class="bg-white p-6 rounded-lg shadow space-y-6">            
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Teklif No</label>
                <input type="text" name="teklif_no" value="{{ $teklif->teklif_no }}" required class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Açıklama</label>
                <textarea name="aciklama" rows="3" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">{{ $teklif->aciklama }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Tutar (₺)</label>
                <input type="number" step="0.01" name="tutar" value="{{ $teklif->tutar }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Alış Tutarı (₺)</label>
                <input type="number" step="0.01" name="alis_tutar" value="{{ $teklif->alis_tutar }}" class="w-full border-gray-300 rounded-md shadow-sm focus:ring focus:ring-blue-200 focus:border-blue-500">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-yellow-600 hover:bg-yellow-700 text-white px-6 py-2 rounded-md shadow-sm transition">
                    Güncelle
                </button>
            </div>
        </form>
    </div>
</x-app-layout>