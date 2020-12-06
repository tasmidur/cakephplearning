<h1 class="mt-4">Static Navigation</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Food</li>
</ol>
<div>
    <?php echo $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-user']).' Add Food',['action' => 'add'],['class' => 'btn btn-success', 'role' => 'button' , 'escape' => false]);?>
    <br>
    <br>
</div>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Image</th>
        <th scope="col">Food Name</th>
        <th scope="col">Price</th>
        <th class="actions">Actions</th>
    </tr>
    </thead>
    <tbody>
        <?php foreach ($foods as $food): ?>
        <tr>
            <td><?= $this->Number->format($food->id) ?></td>
            <td><?=$this->Html->image($food->food_image, array('alt' => 'CakePHP', 'border' => '0' ,'width'=>"100",'height'=>"100"));?></td>
            <td><?= h($food->name) ?></td>
            <td>
                <div>
                    <p>
                        Price: <?= $this->Number->format($food->price) ?>
                    </p>
                    <p>
                        Delivery Cost:<?= $this->Number->format($food->delivery_cost) ?>
                    </p>
                </div>

            </td>
            <td class="actions">
                <?= $this->Html->link(__('View'), ['action' => 'view', $food->id]) ?>
                <?= $this->Html->link(__('Edit'), ['action' => 'edit', $food->id]) ?>
                <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $food->id], ['confirm' => __('Are you sure you want to delete # {0}?', $food->id)]) ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>


