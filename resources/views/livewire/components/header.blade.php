<header>
    <nav>
        <ul>
            <li>
                <span>
                    <a href="{{ route('dashboard') }}">
                        Dashboard <ion-icon name="home-outline"></ion-icon>
                    </a>
                </span>
                <div class="underline"></div></li>
            <li>
                <span class="menu-toggle">
                    Livros <ion-icon name="book-outline"></ion-icon>
                    <div class="underline"></div>
                </span>
                <ul class="submenu">
                    <li>
                        <a href="{{ route('book.add') }}">
                            Adicionar livro
                            <div class="underline"></div>
                        </a> 
                    </li>
                    <li>
                        <a href="{{ route('book.index') }}">
                            Ver livros
                            <div class="underline"></div>
                        </a> 
                    </li>
                    <li>
                        <a href="{{ route('author.add') }}">
                            Adicionar autor
                            <div class="underline"></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category.add') }}">
                            Adicionar categoria
                            <div class="underline"></div>
                        </a>
                    </li>
                </ul>
            </li>
            <li>
                <span class="menu-toggle">
                    Alunos <ion-icon name="school-outline"></ion-icon>
                    <div class="underline"></div>
                </span>
                <ul class="submenu">
                    <li>
                        <a href="">
                            Cadastrar
                            <div class="underline"></div>
                        </a> 
                    </li>
                    <li>
                        <a href="">
                            Ver Alunos
                            <div class="underline"></div>
                        </a> 
                    </li>
                </ul>
            </li>
            <li>
                <span class="menu-toggle">
                    Empréstimo <ion-icon name="checkmark-circle-outline"></ion-icon>
                    <div class="underline"></div>
                </span>
                <ul class="submenu">
                    <li>
                        <a href="">
                            Emprestar
                            <div class="underline"></div>
                        </a> 
                    </li>
                    <li>
                        <a href="">
                            Ver Empréstimos
                            <div class="underline"></div>
                        </a> 
                    </li>
                </ul>
            </li>
            <li>
                <span class="menu-toggle">
                    Reservas <ion-icon name="alarm-outline"></ion-icon>
                    <div class="underline"></div>
                </span>
                <ul class="submenu">
                    <li>
                        <a href="">
                            Reservar
                            <div class="underline"></div>
                        </a> 
                    </li>
                    <li>
                        <a href="">
                            Ver Reservas
                            <div class="underline"></div>
                        </a> 
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
