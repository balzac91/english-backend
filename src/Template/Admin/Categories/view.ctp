<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= __('Categories'); ?></h3>

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?= __('Actions'); ?>&nbsp;
                            <span class="fa fa-caret-down"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->Html->link(__('Edit Category'), ['action' => 'edit', $category->id]); ?></li>
                            <li><?= $this->Form->postLink(__('Delete Category'), ['action' => 'delete', $category->id], ['confirm' => __('Are you sure you want to delete # {0}?', $category->id)]); ?></li>
                            <li><?= $this->Html->link(__('List Categories'), ['action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Category'), ['action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Testtables'), ['controller' => 'Testtables', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Testtable'), ['controller' => 'Testtables', 'action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?= __('Id'); ?></th>
                        <td><?= $this->Number->format($category->id); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Name'); ?></th>
                        <td><?= h($category->name); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Url'); ?></th>
                        <td><?= h($category->url); ?></td>
                    </tr>
                </table>

            </div>
        </div>
    </div>
</div>
