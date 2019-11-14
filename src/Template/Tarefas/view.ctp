<h1><?= h($tarefa->nome) ?></h1>
<p><?= h($tarefa->descricao) ?></p>
<p><small>Criado: <?= $tarefa->created->format(DATE_RFC850) ?></small></p>
<a href='../index'><button>Voltar</button></a>
