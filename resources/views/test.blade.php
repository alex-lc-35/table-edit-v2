@extends('layout')

@section('content')
    <h1 class="text-3xl font-bold mb-4">TEST</h1>

    <div class="space-x-4 mb-4">
        <button id="get-test" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none">GET</button>
        <button id="post-test" class="px-4 py-2 bg-green-500 text-white rounded hover:bg-green-600 focus:outline-none">POST</button>
    </div>

    <pre id="res" class="bg-gray-100 p-4 rounded border border-gray-300"></pre>

    <script>
        document.getElementById('get-test').addEventListener('click', async () => {
            const res = await window.api.get('/test');
            document.getElementById('res').textContent = JSON.stringify(res, null, 2); // Accès direct à #res
        });

        document.getElementById('post-test').addEventListener('click', async () => {
            const newData = { name: 'New Item' };
            const res = await window.api.post('/test', newData);
            document.getElementById('res').textContent = JSON.stringify(res, null, 2); // Accès direct à #res
        });
    </script>
@endsection
