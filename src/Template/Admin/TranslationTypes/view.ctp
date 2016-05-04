<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= __('Translation Types'); ?></h3>

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?= __('Actions'); ?>&nbsp;
                            <span class="fa fa-caret-down"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->Html->link(__('Edit Translation Type'), ['action' => 'edit', $translationType->id]); ?></li>
                            <li><?= $this->Form->postLink(__('Delete Translation Type'), ['action' => 'delete', $translationType->id], ['confirm' => __('Are you sure you want to delete # {0}?', $translationType->id)]); ?></li>
                            <li><?= $this->Html->link(__('List Translation Types'), ['action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Translation Type'), ['action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Answers'), ['controller' => 'Answers', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Answer'), ['controller' => 'Answers', 'action' => 'add']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?= __('Id'); ?></th>
                        <td><?= $this->Number->format($translationType->id); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Name'); ?></th>
                        <td><?= h($translationType->name); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
