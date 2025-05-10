<x-app-layout>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">

        @if (session('success'))
            <div class="mb-6">
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                    <strong class="font-bold">Başarılı!</strong>
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            </div>
        @endif

        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold text-gray-800">İşler Listesi</h1>

            <form method="GET" action="{{ route('isler.index') }}" class="flex items-center gap-2">
            <div class="relative w-full max-w-xs">
                <input
                    type="text"
                    name="arama"
                    value="{{ request('arama') }}"
                    placeholder="İş No, Müşteri, Sistem ID..."
                    class="pl-10 pr-4 py-2 w-full border border-gray-300 rounded-md shadow focus:outline-none focus:ring-2 focus:ring-blue-400 focus:border-blue-400 text-sm text-gray-800"
                >
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M21 21l-4.35-4.35M16 10a6 6 0 11-12 0 6 6 0 0112 0z"/>
                    </svg>
                </div>
            </div>

            <button
                type="submit"
                class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm font-medium rounded-md shadow hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition"
            >
                Ara
            </button>
        </form>

            <a href="{{ route('isler.create') }}" class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-blue-500 to-blue-600 text-white text-sm font-medium rounded-md shadow hover:from-blue-600 hover:to-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition">
                Yeni İş Ekle
            </a>
        </div>

        <div class="overflow-x-auto bg-white shadow rounded-lg">
            <table class="min-w-full table-auto divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">İş No</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Müşteri</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Referans No</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Sistem ID No</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kayıt Tarihi</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">İşi Açan</th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">İşlemler</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($isler as $is)
                        <tr class="hover:bg-gray-50">
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                <a class="hover:underline" href="{{ route('isler.teklifler.index', $is->id) }}">
                                     {{ $is->is_no }}
                                </a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $is->musteri->ad ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            <a class="hover:underline" href="{{ route('isler.teklifler.index', $is->id) }}">    
                                {{ $is->musteri_referans_no }}</td>
                            </a>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $is->sistem_id_no }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                                {{ date('d-m-Y H:i:s', strtotime($is->kayit_tarihi)) }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $is->user->name ?? '-' }}</td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('isler.edit', $is->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">
                                    Düzenle
                                </a>

                                <form action="{{ route('isler.destroy', $is->id) }}" method="POST" class="inline-block" onsubmit="return confirm('İşi silmek istediğinize emin misiniz?')">
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
                            <td colspan="7" class="px-6 py-4 whitespace-nowrap text-center text-gray-500">
                                Henüz kayıtlı iş yok.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</x-app-layout>