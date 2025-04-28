<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold text-gray-800">İşler Listesi</h1>
            <a href="{{ route('isler.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Yeni İş Ekle
            </a>
        </div>

        <div class="overflow-x-auto bg-white rounded shadow">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">İş No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Müşteri</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Referans No</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Kayıt Tarihi</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">İşi Açan</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($isler as $is)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ route('isler.teklifler.index', $is->id) }}" class="text-blue-600 hover:underline">
                                    {{ $is->is_no }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $is->musteri->ad ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">                                <a href="{{ route('isler.teklifler.index', $is->id) }}" class="text-blue-600 hover:underline">
                                {{ $is->musteri_referans_no }}</a></td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $is->kayit_tarihi }}</td>
                            <td class="px-6 py-4 whitespace-nowrap">{{ $is->user->name ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right">
                                <a href="{{ route('isler.edit', $is->id) }}" class="text-indigo-600 hover:text-indigo-900">Düzenle</a>

                                <form action="{{ route('isler.destroy', $is->id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-800" onclick="return confirm('Silmek istediğinize emin misiniz?')">
                                        Sil
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>