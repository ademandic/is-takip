
    <div class="max-w-4xl mx-auto py-10 sm:px-6 lg:px-8">
        <h2 class="text-2xl font-semibold text-gray-800 mb-6">Teknik Data (İş No: {{ $isler->is_no }})</h2>

        @if ($teknikdata)
            <div class="bg-white p-6 rounded shadow space-y-6">
                <fieldset class="border border-gray-300 p-4 rounded">
                    <legend class="text-lg font-medium text-gray-700">Sistem Bilgileri</legend>
                    @foreach(['sistem_tipi', 'sogutma_burcu', 'nozzle_adedi', 'kalip_goz_adedi', 'giris_capi', 'sr_alani'] as $field)
                        <div class="mt-4">
                            <span class="block text-sm font-medium text-gray-600 capitalize">{{ str_replace('_', ' ', $field) }}:</span>
                            <span class="text-gray-800">{{ $teknikdata->$field }}</span>
                        </div>
                    @endforeach
                </fieldset>

                <fieldset class="border border-gray-300 p-4 rounded">
                    <legend class="text-lg font-medium text-gray-700">Parça Detayları</legend>
                    @foreach(['parca_gramaji', 'parca_et_kalinligi', 'malzeme_bilgisi', 'parca_gorselligi'] as $field)
                        <div class="mt-4">
                            <span class="block text-sm font-medium text-gray-600 capitalize">{{ str_replace('_', ' ', $field) }}:</span>
                            <span class="text-gray-800">{{ $teknikdata->$field }}</span>
                        </div>
                    @endforeach
                </fieldset>

                <div class="flex justify-end">
                    <a href="{{ route('isler.teknikdata.edit', [$isler->id, $teknikdata->id]) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                        Düzenle
                    </a>
                </div>
            </div>
        @else
            <div class="bg-yellow-100 text-yellow-800 p-4 rounded shadow">
                Bu işe ait teknik veri bulunamadı.
            </div>

            <div class="mt-6">
                <a href="{{ route('isler.teknikdata.create', $isler->id) }}" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Teknik Data Ekle
                </a>
            </div>
        @endif
    </div>