<h1 class="mt-4">Static Navigation</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Food</li>
</ol>

<div class="card" style="width: 400px;">
    <?=$this->Html->image($food->food_image, array('alt' => 'CakePHP', 'border' => '0' ,'width'=>"400",'height'=>"250"));?>
    <div class="card-body">
        <h5 class="card-title"><?=h($food->name)?></h5>
        <p class="card-text"><?=h($food->details)?></p>
        <?php echo $this->Html->link($this->Html->tag('span','',['class' => 'glyphicon glyphicon-user']).' Go Back',['action' => 'display'],['class' => 'btn btn-success', 'role' => 'button' , 'escape' => false]);?>
    </div>
</div>

