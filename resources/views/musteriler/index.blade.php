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
            <h1 class="text-3xl font-bold text-gray-800">Müşteri Listesi</h1>
            <a href="{{ route('musteriler.create') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm font-medium rounded-md shadow hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                Yeni Müşteri Ekle
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Ad</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Unvan</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Tipi</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">Adres</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">İlgili Kişi</th>
                        <th class="px-4 py-2 text-left text-xs font-semibold text-gray-600 uppercase">İlgili Kişi E-Mail</th>
                        <th class="px-4 py-2 text-right text-xs font-semibold text-gray-600 uppercase">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($musteriler as $musteri)
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $musteri->ad }}</td>
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $musteri->musteri_unvan }}</td>
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $musteri->tipi }}</td>
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $musteri->adres }}</td>
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $musteri->ilgili_kisi }}</td>
                            <td class="px-4 py-2 text-sm text-gray-900">{{ $musteri->ilgili_kisi_email }}</td>
                            <td class="px-4 py-2 text-right">
                                <a href="{{ route('musteriler.edit', $musteri->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">
                                    Düzenle
                                </a>

                                <form action="{{ route('musteriler.destroy', $musteri->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Müşteriyi silmek istediğinize emin misiniz?')">
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
                            <td colspan="7" class="px-4 py-2 text-center text-gray-500">
                                Henüz müşteri kaydı yok.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>