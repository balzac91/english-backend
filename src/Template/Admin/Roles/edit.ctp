<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= __('Edit Role') ?></h3>

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?= __('Actions'); ?>&nbsp;
                            <span class="fa fa-caret-down"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->Form->postLink(
                                    __('Delete'),
                                    ['action' => 'delete', $role->id],
                ['confirm' => __('Are you sure you want to delete # {0}?', $role->id)]
            );
        ?></li>
                            <li><?= $this->Html->link(__('List Roles'), ['action' => 'index']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>


            <div class="box-body">
                <?= $this->Form->create($role); ?>
                <div class="form-group">
                    <?= $this->Form->input('name', ['class' => 'form-control']); ?>
                </div>

                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary pull-right']); ?>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
