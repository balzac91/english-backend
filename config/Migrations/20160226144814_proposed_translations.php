<?php

use Phinx\Migration\AbstractMigration;

class ProposedTranslations extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $proposedTranslations = $this->table('proposed_translations');
        $proposedTranslations->addColumn('word_id', 'integer')
            ->addColumn('user_id', 'integer')
            ->addColumn('polish', 'string', array('limit' => 255, 'null' => true))
            ->addColumn('english', 'string', array('limit' => 255, 'null' => true))
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();
    }
}
