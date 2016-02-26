<div class="row">
    <div class="col-xs-12">
        <div class="box box-primary">
            <div class="box-header">
                <h3 class="box-title"><?= __('Proposed Translations'); ?></h3>

                <div class="pull-right">
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown">
                            <?= __('Actions'); ?>&nbsp;
                            <span class="fa fa-caret-down"></span>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-right">
                            <li><?= $this->Html->link(__('Edit Proposed Translation'), ['action' => 'edit', $proposedTranslation->id]); ?></li>
                            <li><?= $this->Form->postLink(__('Delete Proposed Translation'), ['action' => 'delete', $proposedTranslation->id], ['confirm' => __('Are you sure you want to delete # {0}?', $proposedTranslation->id)]); ?></li>
                            <li><?= $this->Html->link(__('List Proposed Translations'), ['action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Proposed Translation'), ['action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Words'), ['controller' => 'Words', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New Word'), ['controller' => 'Words', 'action' => 'add']); ?></li>
                            <li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']); ?></li>
                            <li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']); ?></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="box-body">
                <table class="table table-striped table-bordered">
                    <tr>
                        <th><?= __('Id'); ?></th>
                        <td><?= $this->Number->format($proposedTranslation->id); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Word'); ?></th>
                        <td><?= $proposedTranslation->has('word') ? $this->Html->link($proposedTranslation->word->id, ['controller' => 'Words', 'action' => 'view', $proposedTranslation->word->id]) : ''; ?></td>
                    </tr>
                    <tr>
                        <th><?= __('User'); ?></th>
                        <td><?= $proposedTranslation->has('user') ? $this->Html->link($proposedTranslation->user->id, ['controller' => 'Users', 'action' => 'view', $proposedTranslation->user->id]) : ''; ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Polish'); ?></th>
                        <td><?= h($proposedTranslation->polish); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('English'); ?></th>
                        <td><?= h($proposedTranslation->english); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Created'); ?></th>
                        <td><?= h($proposedTranslation->created); ?></td>
                    </tr>
                    <tr>
                        <th><?= __('Modified'); ?></th>
                        <td><?= h($proposedTranslation->modified); ?></td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>
