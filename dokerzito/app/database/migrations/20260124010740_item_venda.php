<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class SaleItems extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('sale_items', ['id' => false, 'primary_key' => ['id']]);

        $table
            ->addColumn('id', 'biginteger', ['identity' => true])
            ->addColumn('id_venda', 'biginteger')
            ->addColumn('id_produto', 'biginteger')
            ->addColumn('quantidade', 'integer', ['default' => 1])
            ->addColumn('valor_unitario', 'decimal', ['precision' => 18, 'scale' => 4])
            ->addColumn('valor_total', 'decimal', ['precision' => 18, 'scale' => 4])
            ->addColumn('data_cadastro', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])

            ->addForeignKey('id_venda', 'sales', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])
            ->addForeignKey('id_produto', 'products', 'id', ['delete'=> 'RESTRICT', 'update'=> 'CASCADE'])

            ->create();
    }
}
