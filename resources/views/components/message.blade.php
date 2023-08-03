@if (session()->has('message'))
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg p-4">
                <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4" role="alert">
                    <p>{{ session('message') }}</p>
                </div>
            </div>
        </div>
    </div>
@endif
