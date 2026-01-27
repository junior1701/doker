<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class SaleInstallments extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('sale_installments', ['id' => false, 'primary_key' => ['id']]);

        $table
            ->addColumn('id', 'biginteger', ['identity' => true])
            ->addColumn('id_venda', 'biginteger')
            ->addColumn('numero_parcela', 'integer')
            ->addColumn('valor', 'decimal', ['precision' => 18, 'scale' => 4])
            ->addColumn('data_vencimento', 'date')
            ->addColumn('pago', 'boolean', ['default' => false])

            ->addForeignKey('id_venda', 'sales', 'id', ['delete'=> 'CASCADE', 'update'=> 'CASCADE'])

            ->create();
    }
}
