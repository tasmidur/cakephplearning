<h1 class="mt-4">Static Navigation</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
    <li class="breadcrumb-item active">Static Navigation</li>
</ol>
<div class="container">
    <div class="row">
        <div class="col-sm-3"></div>
        <div class="col-sm-6">
            <?php echo $this->Form->create($food, ['name'=>'add_post', 'class'=>'was-validated',
                'enctype'=>'multipart/form-data']) ?>
            <div class="form-group">
                <?php echo $this->Form->control('name', ['type'=>'text', 'class'=>'form-control','placeholder'=>'Enter title','required'=>true]);?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->control('details', ['type'=>'text', 'class'=>'form-control','placeholder'=>'Enter description','required'=>true]);?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->control('price', ['type'=>'number', 'class'=>'form-control','placeholder'=>'Enter description','required'=>true]);?>
            </div>
            <div class="form-group">
                <?php echo $this->Form->control('delivery_cost', ['type'=>'number', 'class'=>'form-control','placeholder'=>'Enter description','required'=>true]);?>
            </div>
            <div class="form-group">
                <?= $this->Form->control('image_file', ['type'=>'file', 'class'=>'form-control']); ?>
            </div>
            <div>
                <?=$this->Html->image($food->food_image, array('alt' => 'CakePHP', 'border' => '0' ,'width'=>"100",'height'=>"100"));?>
            </div>

            <button type="submit" class="btn btn-success" style="float: right;">Save</button>
            <?php echo $this->Form->end() ?>
        </div>
    </div>
</div>

