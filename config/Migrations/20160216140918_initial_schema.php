<?php

use Phinx\Migration\AbstractMigration;

class InitialSchema extends AbstractMigration
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
        $categories = $this->table('categories');
        $categories->addColumn('name', 'string', array('limit' => 255))
            ->addColumn('url', 'string', array('limit' => 255))
            ->create();

        $levels = $this->table('levels');
        $levels->addColumn('name', 'string', array('limit' => 255))
            ->create();

        $words = $this->table('words');
        $words->addColumn('category_id', 'integer')
            ->addColumn('level_id', 'integer', array('null' => true))
            ->addColumn('polish', 'string', array('limit' => 255))
            ->addColumn('english', 'string', array('limit' => 255))
            ->addColumn('created', 'datetime')
            ->addColumn('modified', 'datetime')
            ->create();
    }
}
