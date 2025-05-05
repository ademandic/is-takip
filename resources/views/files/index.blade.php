<x-app-layout>
    <div class="flex min-h-screen bg-gray-50">

        <x-isler.side-navbar :isler="$isler" />

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-gray-100">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Dosyalar</h1>

            <div class="mb-4">
                <a href="{{ route('isler.files.create', $isler->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Yeni Dosya Yükle
                </a>
            </div>

            @if ($files->count())
                <div class="space-y-4">
                    @foreach ($files as $file)
                        <div class="flex items-center justify-between p-4 bg-white border rounded shadow-sm">
                            <a href="{{ asset('storage/' . $file->dosya_yolu) }}" target="_blank" class="text-blue-700 underline">
                                {{ $file->dosya_adi }}
                            </a>

                            <form method="POST" action="{{ route('isler.files.destroy', [$isler->id, $file->id]) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:underline">Sil</button>
                            </form>
                        </div>
                    @endforeach
                </div>
            @else
                <p class="text-gray-600">Henüz dosya yüklenmemiş.</p>
            @endif
        </main>
    </div>
</x-app-layout>