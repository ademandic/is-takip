<x-app-layout>
    <div class="flex min-h-screen bg-gray-50">

        <x-isler.side-navbar :isler="$isler" />

        <!-- Main Content -->
        <main class="flex-1 p-6 bg-gray-100">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Yeni Dosya Yükle</h1>


            <form method="POST" action="{{ route('isler.files.store', $isler->id) }}"
                enctype="multipart/form-data" class="dropzone border-dashed border-2 border-gray-400 rounded p-6 bg-white" id="file-dropzone">
              @csrf
              <p class="text-center text-gray-500 mb-4">Dosya eklemek için buraya sürükleyin ya da tıklayın.</p>
              <input type="file" name="dosya" multiple class="hidden">
          </form>
        </main>
    </div>

    @push('scripts')
        <script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.js"></script>
        <link href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.9.3/min/dropzone.min.css" rel="stylesheet" />

        <script>
            Dropzone.autoDiscover = false;
            document.addEventListener('DOMContentLoaded', function () {
        new Dropzone("#file-dropzone", {
            paramName: 'dosya',
            maxFilesize: 10,
            acceptedFiles: '.pdf,.doc,.docx,.jpg,.png,.zip',
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            success: function () {
                location.href = "{{ route('isler.files.index', $isler->id) }}";
            }
        });
    });
        </script>
    @endpush

</x-app-layout>