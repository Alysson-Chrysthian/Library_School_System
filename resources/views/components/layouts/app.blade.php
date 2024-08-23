<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Library System</title>

    {{-- Bootstrap --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

    {{-- Favicon --}}
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">

    {{-- Styles --}}
    @vite('resources/css/app.css')
    @vite('resources/css/components/layouts/app.css')
    @vite('resources/css/livewire/header.css')
    
    @if(isset($styles))
        {{ $styles }}
    @endif

    <livewire:styles />

</head>
<body>
    
    @livewire('components.header')

    <main>

        <div>
            {{ $content }}
        </div>

        <footer>
            <p>App feito por <a target="_blank" href="https://www.instagram.com/alyssonchrysthian/">@AlyssonChrysthian</a> para a biblioteca da EEEP Rita Matos Luna</p>
        </footer>

    </main>

    {{-- Ion-Icons Library --}}
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>

    {{-- Scripts --}}
    @vite('resources/js/app.js')
    <script>
    const menuToggle = document.querySelectorAll('.menu-toggle');

    menuToggle.forEach(element => {
        element.addEventListener('click', function () {
            let subMenu = this.nextElementSibling;
            
            console.log(subMenu.style);

            switch (subMenu.style.display) {
                case '':
                    subMenu.style.display = 'block';
                    break;
                case 'none':
                    subMenu.style.display = 'block'
                    break;
                case 'block':
                    subMenu.style.display = 'none';
                    break;
            }
        })
    });
    </script>
    <script>
        document.addEventListener('livewire:init', () => {
            const modal = document.querySelector('.modal');
            
            if (modal != null) {
                Livewire.on('set_message', (message) => {
                    document.querySelector('.modal-title').innerText = message[1];
                    document.querySelector('.modal-body').innerText = message[0];

                    modal.style.display = 'block';
                });
                document.querySelector('#close_button').addEventListener('click', () => {
                    modal.style.display = 'none';

                    Livewire.dispatch('clear_messages');
                })
            }
        })
    </script>

    @if(isset($scripts))
        {{ $scripts }}
    @endif


    <livewire:scripts />

</body>
</html>