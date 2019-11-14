<h2>Lista de tarefas</h2>
<table>
    <tr>
        <th>Id</th>
        <th>Nome da tarefa</th>
        <th>Descrição</th>
        <th>Correção da tarefa</th>
        <th>Data de criação</th>
        <th>Ação</th>
    </tr>

    <?php foreach ($tarefas as $tarefa): ?>
    <tr>
        <td><?= $tarefa->id ?></td>
        <td>
            <?= $this->Html->link($tarefa->nome, ['action' => 'view', $tarefa->id]) ?>
        </td>
        <td><?= $tarefa->descricao ?></td>
        <td>
            <?php if($tarefa->realizado == 1){echo "Realizada";}else{echo "Pendente";} ?>
         </td>
        <td>
            <?= $tarefa->data_criacao ?>
        </td>
        <td>
            <?= $this->Html->link('Editar', ['action' => 'edit', $tarefa->id]) ?>
            <?= $this->Form->postLink(
                'Deletar',
                ['action' => 'delete', $tarefa->id],
                ['confirm' => 'Tem certeza?'])
            ?>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
<button class="buttonS"><?= $this->Html->link('Cadastrar', ['action' => 'add']) ?></button>
