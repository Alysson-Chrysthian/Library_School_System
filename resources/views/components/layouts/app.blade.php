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

    {{-- JQuery --}}
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

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
        const toggleMenu = $('.menu-toggle');

        toggleMenu.on('click', (event) => {
            $(event.target).next('.submenu').slideToggle()
        })
    </script>
    <script>
        $(document).on('livewire:init', () => {
            const modal = $('.modal');
            
            if (modal != null) {
                Livewire.on('set_message', (message) => {
                    $('.modal-title').text(message[1]);
                    $('.modal-body').text(message[0]);

                    modal.css('display', 'block');
                });
                $('#close_button').on('click', () => {
                    modal.css('display', 'none');

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