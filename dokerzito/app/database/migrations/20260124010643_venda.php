<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Sales extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('sales', ['id' => false, 'primary_key' => ['id']]);

        $table
            ->addColumn('id', 'biginteger', ['identity' => true])
            ->addColumn('id_cliente', 'biginteger')
            ->addColumn('id_empresa', 'biginteger')
            ->addColumn('id_condicao_pagamento', 'biginteger', ['null' => true])
            ->addColumn('valor_total', 'decimal', ['precision' => 18, 'scale' => 4, 'default' => 0])
            ->addColumn('status', 'text', ['default' => 'ABERTA'])
            ->addColumn('data_venda', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('data_cadastro', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])
            ->addColumn('data_alteracao', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])

            ->addForeignKey('id_cliente', 'clients', 'id', ['delete'=> 'RESTRICT', 'update'=> 'CASCADE'])
            ->addForeignKey('id_empresa', 'companies', 'id', ['delete'=> 'RESTRICT', 'update'=> 'CASCADE'])

            ->create();
    }
}
