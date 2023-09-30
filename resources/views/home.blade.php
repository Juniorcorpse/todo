<!DOCTYPE html>

<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>TodoApp</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
        <!-- <link rel="stylesheet" href="/assets/css/style.css"> -->
        @vite('assets/css/style.css')
        @vite('assets/css/output.css')
        @livewireStyles
    </head>
    <body class="bg-slate-900 text-slate-300">
       <div class="container flex  w-full h-full">
        <div class="sidebar w-24 bg-indigo-500">sidebar</div>
        <div class="contente">contente</div>
       </div>


        <script src="" async defer></script>
        @livewireScripts
    </body>
</html>