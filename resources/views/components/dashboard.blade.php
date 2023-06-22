<x-layout>
    <x-slot:title>
        <title>Dashboard {{ isset($title)? '| ' . $title : '' }}</title>
    </x-slot:title>
    <div class="antialiased bg-gray-50 dark:bg-gray-900">
        <x-nav />
        <!-- Sidebar -->
        <x-aside/>
        <main class="p-4 md:ml-64 h-auto pt-20">
          <div class="grid grid-cols-3 gap-4">
            <div class="col-span-full">
                <h1 class="text-2xl font-semibold dark:text-white">User settings</h1>
            </div>
            {{ $slot }}
          </div>
        </main>
      </div>
      <x-slot:script>
        {{ $script }}
        <script>
            const token = '{{  csrf_token() }}'
            $('#logoutButton').click(function(event) {
                event.preventDefault();
                $.ajax({
                    url: '{{ route('logout') }}',
                    method: 'POST',
                    dataType: 'json',
                    data: {
                        _token: token
                    },
                    success: function(response) {
                        // Handle successful logout
                        window.location.href = '{{ route('login') }}';
                    },
                    error: function(xhr, status, error) {
                        // Handle error
                        console.log(xhr.responseText);
                    }
                });
            });

        </script>
    </x-slot:script>
</x-layout>
