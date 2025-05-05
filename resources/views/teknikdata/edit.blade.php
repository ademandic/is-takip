<x-app-layout>
    <div class="flex">
        {{-- Side Navbar --}}
        <x-isler.side-navbar :isler="$isler" />

        <div class="flex-1 max-w-5xl mx-auto py-10 px-6">
            <h2 class="text-2xl font-bold text-gray-800 mb-6">Teknik Data Düzenle (İş No: {{ $isler->is_no }})</h2>

            <form method="POST" action="{{ route('isler.teknikdata.update', [$isler->id, $teknikdata->id]) }}" class="space-y-6 bg-white p-6 rounded-lg shadow-md">
                @csrf
                @method('PUT')

                {{-- Sistem Bilgileri --}}
                <fieldset class="border border-gray-300 p-4 rounded">
                    <legend class="text-lg font-semibold text-gray-700">Sistem Bilgileri</legend>

                    @foreach ([
                        'sistem_tipi' => 'Sistem Tipi',
                        'sogutma_burcu' => 'Soğutma Burcu',
                        'nozzle_adedi' => 'Nozzle Adedi',
                        'kalip_goz_adedi' => 'Kalıp Göz Adedi',
                        'giris_capi' => 'Giriş Çapı',
                        'sr_alani' => 'SR Alanı'
                    ] as $field => $label)
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
                            <input type="text" name="{{ $field }}" value="{{ old($field, $teknikdata->$field) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                    @endforeach
                </fieldset>

                {{-- Parça Detayları --}}
                <fieldset class="border border-gray-300 p-4 rounded">
                    <legend class="text-lg font-semibold text-gray-700">Parça Detayları</legend>

                    @foreach ([
                        'parca_gramaji' => 'Parça Gramajı',
                        'parca_et_kalinligi' => 'Parça Et Kalınlığı',
                        'malzeme_bilgisi' => 'Malzeme Bilgisi'
                    ] as $field => $label)
                        <div class="mt-4">
                            <label class="block text-sm font-medium text-gray-700">{{ $label }}</label>
                            <input type="text" name="{{ $field }}" value="{{ old($field, $teknikdata->$field) }}"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" />
                        </div>
                    @endforeach

                    <div class="mt-4">
                        <label class="block text-sm font-medium text-gray-700">Parça Görselliği</label>
                        <select name="parca_gorselligi"
                            class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500">
                            <option value="">Seçiniz</option>
                            <option value="evet" {{ old('parca_gorselligi', $teknikdata->parca_gorselligi) == 'evet' ? 'selected' : '' }}>Evet</option>
                            <option value="hayir" {{ old('parca_gorselligi', $teknikdata->parca_gorselligi) == 'hayir' ? 'selected' : '' }}>Hayır</option>
                        </select>
                    </div>
                </fieldset>

                <div class="flex justify-end">
                    <button type="submit"
                        class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition duration-200">
                        Güncelle
                    </button>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>