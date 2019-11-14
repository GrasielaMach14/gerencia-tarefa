
<h1>Cadastrar Tarefa</h1>
<?php
    echo $this->Form->create($tarefa);
    echo $this->Form->input('nome');
    echo $this->Form->input('descricao', ['label' => 'Descrição:','rows' => '3']);
?>
<div class="container">
    <div class="row">
        <div class="col-sm">
            <?php
              echo $this->Form->input('data_criacao', ['label'=>'Data de criação:', 'type'=>'date']);
            ?>
        </div>
        <div class="col-sm">
            <label class="labelS" style="font-weight: bold;">Correção da tarefa:</label>
            <?php
                echo $this->Form->radio('realizado', ['Pendente', 'Realizada']);
            ?>
        </div>
    </div>
</div>
<?php 
    echo $this->Form->button(__('Cadastrar'));
    echo $this->Form->end();
?>
    <a href='index'><button>Voltar</button></a>
