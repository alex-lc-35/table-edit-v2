@extends('layout')

@section('content')
    <h1 class="text-3xl font-bold mb-4">TEST</h1>

    <div class="space-x-4 mb-4">
        <button id="test" class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600 focus:outline-none">TEST</button>
    </div>

    <div id="spreadsheet"></div>

    <pre id="res" class="bg-gray-100 p-4 rounded border border-gray-300"></pre>

    <script>
        document.addEventListener("DOMContentLoaded", async function () {
            const tableEdit = await window.initTableEdit();
            console.log(tableEdit);
            const name = tableEdit.getName();
            console.log(name);
        });
    </script>
@endsection
