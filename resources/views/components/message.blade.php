@if (session()->has('message'))
    <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 my-4" role="alert">
        <p>{{ session('message') }}</p>
    </div>
@endif