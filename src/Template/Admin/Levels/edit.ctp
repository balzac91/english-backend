<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= __('Edit Level') ?></h3>

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?= __('Actions'); ?>&nbsp;
                            <span class="fa fa-caret-down"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $level->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $level->id)]
            );
        ?></li>
                            <li><?= $this->Html->link(__('List Levels'), ['action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('List Testtables'), ['controller' => 'Testtables', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Testtable'), ['controller' => 'Testtables', 'action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="box-body">
                <?= $this->Form->create($level); ?>
                <div class="form-group">
                    <?= $this->Form->input('name', ['class' => 'form-control']); ?>
                </div>

                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary pull-right']); ?>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
