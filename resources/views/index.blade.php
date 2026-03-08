@extends('layout')

@section('content')
    <h1>spreadsheet</h1>

    <div id="spreadsheet"></div>

    <script type="module">
        window.initJspreadsheet()
    </script>
@endsection
