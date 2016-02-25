<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= __('Words'); ?></h3>

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?= __('Actions'); ?>&nbsp;
                            <span class="fa fa-caret-down"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->Html->link(__('Edit Word'), ['action' => 'edit', $word->id]); ?></li>
                            <li><?= $this->Form->postLink(__('Delete Word'), ['action' => 'delete', $word->id], ['confirm' => __('Are you sure you want to delete # {0}?', $word->id)]); ?></li>
                            <li><?= $this->Html->link(__('List Words'), ['action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Word'), ['action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Categories'), ['controller' => 'Categories', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Category'), ['controller' => 'Categories', 'action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Levels'), ['controller' => 'Levels', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Level'), ['controller' => 'Levels', 'action' => 'add']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?= __('Id'); ?></th>
                        <td><?= $this->Number->format($word->id); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Category'); ?></th>
                        <td><?= $word->has('category') ? $this->Html->link($word->category->name, ['controller' => 'Categories', 'action' => 'view', $word->category->id]) : ''; ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Level'); ?></th>
                        <td><?= $word->has('level') ? $this->Html->link($word->level->name, ['controller' => 'Levels', 'action' => 'view', $word->level->id]) : ''; ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Polish'); ?></th>
                        <td><?= h($word->polish); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('English'); ?></th>
                        <td><?= h($word->english); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created'); ?></th>
                        <td><?= h($word->created); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified'); ?></th>
                        <td><?= h($word->modified); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
