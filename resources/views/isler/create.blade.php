<x-app-layout>
    <div class="max-w-3xl mx-auto py-10 sm:px-6 lg:px-8">

        <h1 class="text-2xl font-bold text-gray-800 mb-6">Yeni İş Ekle</h1>

        <form method="POST" action="{{ route('isler.store') }}" class="space-y-6 bg-white p-6 rounded shadow">
            @csrf

            <div>
                <label class="block text-sm font-medium text-gray-700">İş No</label>
                <input type="text" name="is_no" required class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Müşteri</label>
                <select name="musteri_id" required class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
                    @foreach($musteriler as $musteri)
                        <option value="{{ $musteri->id }}">{{ $musteri->ad }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-sm font-medium text-gray-700">Müşteri Referans No</label>
                <input type="text" name="musteri_referans_no" class="mt-1 block w-full border-gray-300 rounded shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200 focus:ring-opacity-50">
            </div>

            <div class="flex justify-end">
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded hover:bg-green-700">
                    Kaydet
                </button>
            </div>
        </form>

    </div>
</x-app-layout>