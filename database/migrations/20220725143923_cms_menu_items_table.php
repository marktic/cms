<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CmsMenuItems extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * https://book.cakephp.org/phinx/0/en/migrations.html#the-change-method
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change(): void
    {
        $table_name = 'mkt_cms_items';
        $exists = $this->hasTable($table_name);
        if ($exists) {
            return;
        }
        $table = $this->table($table_name);
        $table
            ->addColumn('menu_id', 'integer', ['null' => false ])
            ->addColumn('parent_id', 'integer', ['null' => true])
            ->addColumn('owner_id', 'integer', ['null' => true])
            ->addColumn('owner', 'string', ['null' => true])
            ->addColumn('label', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('link', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('target', 'string', ['limit' => 255, 'null' => true])
            ->addColumn('type', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('metadata', 'json', ['null' => true])
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
            ])
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
            ])
        ->addIndex(['menu_id'], ['name' => 'idx_menu_id'])
        ->addIndex(['parent_id'], ['name' => 'idx_parent_id'])
        ->addIndex(['owner', 'owner_id'], ['name' => 'idx_owner'])
        ->addForeignKey('menu_id', 'mkt_cms_menus', 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION'])
        ->addForeignKey('parent_id', $table_name, 'id', ['delete'=> 'CASCADE', 'update'=> 'NO_ACTION']);

        $table->save();
    }
}
