@props(['isler'])

<div class="w-64 min-h-screen bg-white p-4 border-r shadow-md">
    <h3 class="text-lg font-semibold text-gray-800 mb-6">İş No: {{ $isler->is_no }}</h3>

    <nav class="space-y-2">
        <a href="{{ route('isler.teklifler.index', $isler->id) }}"
           class="block px-4 py-2 rounded {{ request()->routeIs('isler.teklifler.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-100' }}">
            Teklifler
        </a>

        <a href="{{ route('isler.teknikdata.index', [$isler->id, optional($isler->teknikdata)->id ?? 0]) }}"
           class="block px-4 py-2 rounded {{ request()->routeIs('isler.teknikdata.*') ? 'bg-blue-600 text-white' : 'text-gray-700 hover:bg-blue-100' }}">
            Teknik Data
        </a>

        <a href="#"
           class="block px-4 py-2 rounded text-gray-400 cursor-not-allowed">
            Dosyalar (yakında)
        </a>
    </nav>
</div>