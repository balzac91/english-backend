<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= __('Add Word') ?></h3>

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?= __('Actions'); ?>&nbsp;
                            <span class="fa fa-caret-down"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->Html->link(__('List Words'), ['action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Proposed Translations'), ['controller' => 'ProposedTranslations', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Proposed Translation'), ['controller' => 'ProposedTranslations', 'action' => 'add']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <?= $this->Form->create($word); ?>
                <div class="form-group">
                    <?= $this->Form->input('category_id', ['options' => $categories, 'class' => 'form-control']); ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->input('level_id', ['options' => $levels, 'empty' => true, 'class' => 'form-control']); ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->input('polish', ['class' => 'form-control']); ?>
                </div>

                <div class="form-group">
                    <?= $this->Form->input('english', ['class' => 'form-control']); ?>
                </div>

                <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary pull-right']); ?>
                <?= $this->Form->end(); ?>
            </div>
        </div>
    </div>
</div>
