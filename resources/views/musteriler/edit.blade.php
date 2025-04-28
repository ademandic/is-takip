<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">
        <h1 class="text-2xl font-bold text-gray-800 mb-6">Müşteri Düzenle</h1>

        <form method="POST" action="{{ route('musteriler.update', $musteri->id) }}" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf
            @method('PUT')

            <div>
                <label class="block text-sm font-medium text-gray-700">Ad</label>
                <input type="text" name="ad" value="{{ $musteri->ad }}" required class="input">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Unvan</label>
                <input type="text" name="musteri_unvan" value="{{ $musteri->musteri_unvan }}" class="input">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Tipi</label>
                <input type="text" name="tipi" value="{{ $musteri->tipi }}" class="input">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Adres</label>
                <textarea name="adres" rows="3" class="input">{{ $musteri->adres }}</textarea>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">İlgili Kişi</label>
                <input type="text" name="ilgili_kisi" value="{{ $musteri->ilgili_kisi }}" class="input">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">İlgili Kişi E-Mail</label>
                <input type="email" name="ilgili_kisi_email" value="{{ $musteri->ilgili_kisi_email }}" class="input">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="btn-primary">Güncelle</button>
            </div>
        </form>
    </div>
</x-app-layout>