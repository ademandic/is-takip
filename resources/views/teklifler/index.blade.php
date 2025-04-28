<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        @if (session('success'))
            <div class="mb-6">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded">
                    {{ session('success') }}
                </div>
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">İş No: {{ $isler->is_no }} - Teklifler</h1>

            <a href="{{ route('isler.teklifler.create', ['isler' => $isler->id]) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Yeni Teklif Ekle
            </a>
        </div>

        @if ($teklifler->count() > 0)
    <div class="grid grid-cols-2 gap-6 mb-6">
        <div class="bg-green-100 border border-green-400 text-green-700 px-6 py-4 rounded-lg shadow">
            <div class="text-sm font-medium uppercase text-gray-600">Toplam Tutar</div>
            <div class="text-2xl font-bold">{{ number_format($teklifler->sum('tutar'), 2) }} $</div>
        </div>

        <div class="bg-blue-100 border border-blue-400 text-blue-700 px-6 py-4 rounded-lg shadow">
            <div class="text-sm font-medium uppercase text-gray-600">Toplam Alış Tutarı</div>
            <div class="text-2xl font-bold">{{ number_format($teklifler->sum('alis_tutar'), 2) }} $</div>
        </div>
    </div>
@endif

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Teklif No</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Açıklama</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Tutar</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Alış Tutarı</th>
                        <th class="px-4 py-2 text-right text-xs font-semibold text-gray-600 uppercase">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($teklifler as $teklif)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2">{{ $teklif->teklif_no }}</td>
                            <td class="px-4 py-2">{{ $teklif->aciklama }}</td>
                            <td class="px-4 py-2">{{ number_format($teklif->tutar, 2) }} ₺</td>
                            <td class="px-4 py-2">{{ number_format($teklif->alis_tutar, 2) }} ₺</td>
                            <td class="px-4 py-2 text-right">
                                <a href="{{ route('isler.teklifler.edit', [$isler->id, $teklif->id]) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    Düzenle
                                </a>
                            
                                <a href="{{ route('isler.teklifler.pdf', [$isler->id, $teklif->id]) }}" class="text-green-600 hover:text-green-900 mr-3">
                                    PDF
                                </a>
                            
                                <form action="{{ route('isler.teklifler.destroy', [$isler->id, $teklif->id]) }}" method="POST" class="inline-block" onsubmit="return confirm('Teklifi silmek istediğinize emin misiniz?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800">
                                        Sil
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-4 py-2 text-center text-gray-500">
                                Henüz teklif bulunmuyor.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>