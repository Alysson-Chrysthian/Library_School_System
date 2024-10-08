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
                        <a href="{{ route('author.index') }}">
                            Ver autor
                            <div class="underline"></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category.add') }}">
                            Adicionar categoria
                            <div class="underline"></div>
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('category.index') }}">
                            Ver categorias
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
                        <a href="{{ route('student.add') }}">
                            Cadastrar
                            <div class="underline"></div>
                        </a> 
                    </li>
                    <li>
                        <a href="{{ route('student.index') }}">
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
                        <a href="{{ route('borrows.add') }}">
                            Emprestar
                            <div class="underline"></div>
                        </a> 
                    </li>
                    <li>
                        <a href="{{ route('borrows.index') }}">
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
                        <a href="{{ route('reserve.add') }}">
                            Reservar
                            <div class="underline"></div>
                        </a> 
                    </li>
                    <li>
                        <a href="{{ route('reserve.index') }}">
                            Ver Reservas
                            <div class="underline"></div>
                        </a> 
                    </li>
                </ul>
            </li>
        </ul>
    </nav>
</header>
