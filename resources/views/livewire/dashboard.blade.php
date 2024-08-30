<div id="dashboard">
    <div class="card text-white bg-danger mb-3">
        <div class="card-header">
            <h2>Livros atrasados</h2>
        </div>
        <div class="card-body">
            <div class="card-text">
                <p>Há um total de <strong>{{ $late_books }}</strong> livros atrasados, clique no botão abaixo para ver todos agora</p>
                <a href="">
                    <button class="btn btn-primary">
                        Ver livros atrasados
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="card text-dark bg-warning mb-3">
        <div class="card-header">
            <h2>Livros indisponiveis</h2>
        </div>
        <div class="card-body">
            <div class="card-text">
                <p>Ha um total de <strong>{{ $unvaliable_books }}</strong> livros indisponiveis, clique no botao abaixo para ver todos os livros indisponiveis</p>
                <a href="">
                    <button class="btn btn-primary">
                        Ver livros indisponiveis
                    </button>
                </a>
            </div>
        </div>
    </div>
    <div class="card text-white bg-success mb-3">
        <div class="card-header">
            <h2>Livros emprestados e reservados</h2>
        </div>
        <div class="card-body">
            <p class="card-text">Há um total de <strong>{{ $reserved_borrows }}</strong> livros que estao emprestados e reservados ao mesmo tempo, clique no botao abaixo para ver todos eles</p>
            <a href="">
                <button class="btn btn-primary">
                    Ver todos
                </button>
            </a>    
        </div>
    </div>
</div>
