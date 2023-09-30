<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@400;500&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" type="text/css" href={{asset('assets/css/style.css')}} />    
    <title>todoApp</title>
    
</head>
<body>
    <div class="container ds-f">
        <div class="sidebar bg_primary">Logo</div>
        <div class="content ">
            <nav class="ds-f ">
                <a href="#" class="btn btn-primary">Criar Tarefa</a>
            </nav>
            <main class="ds-f pd-2">
                <section class="graph">
                    <div class="graph_header ds-f">
                        <h2 class="ds-ib">Progresso do Dia</h2>
                        <div class="linhaHeader"></div>
                        data                        
                    </div>
                    <div class="graph_header-subtitle">Tarefas: <b>3/6</b></div>
                </section>
                <section class="list">Lista</section>
            </main>
        </div>
    </div>

    
</body>
</html>