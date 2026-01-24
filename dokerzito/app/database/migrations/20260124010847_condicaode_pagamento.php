<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class PaymentConditions extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('payment_conditions', ['id' => false, 'primary_key' => ['id']]);

        $table
            ->addColumn('id', 'biginteger', ['identity' => true])
            ->addColumn('descricao', 'text')
            ->addColumn('quantidade_parcelas', 'integer', ['default' => 1])
            ->addColumn('ativo', 'boolean', ['default' => true])
            ->addColumn('data_cadastro', 'datetime', ['default' => 'CURRENT_TIMESTAMP'])

            ->create();
    }
}
