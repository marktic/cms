<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class CmsPageBlocksTable extends AbstractMigration
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
        $table_name = 'mkt_cms_page_blocks';
        $exists = $this->hasTable($table_name);
        if ($exists) {
            return;
        }
        $table = $this->table($table_name);
        $table
            ->addColumn('section_id', 'integer', ['null' => false, 'signed' => false])
            ->addColumn('type', 'string', ['limit' => 100, 'null' => false])
            ->addColumn('title', 'string', ['limit' => 255, 'null' => false])
            ->addColumn('metadata', 'json', ['null' => true])
            ->addColumn('order', 'integer', ['null' => false, 'signed' => false, 'default' => 0, 'limit' => \Phinx\Db\Adapter\MysqlAdapter::INT_TINY])
            ->addColumn('updated_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
                'update' => 'CURRENT_TIMESTAMP',
            ])
            ->addColumn('created_at', 'timestamp', [
                'default' => 'CURRENT_TIMESTAMP',
            ])
            ->addIndex(['section_id'])
            ->addForeignKey('section_id', 'mkt_cms_page_sections', 'id', ['delete' => 'CASCADE', 'update' => 'NO_ACTION']);

        $table->save();
    }
}
