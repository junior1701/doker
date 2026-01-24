<?php

declare(strict_types=1);

use Phinx\Migration\AbstractMigration;

final class Installments extends AbstractMigration
{
    public function change(): void
    {
        $table = $this->table('installments', ['id' => false, 'primary_key' => ['id']]);

        $table
            ->addColumn('id', 'biginteger', ['identity' => true])
            ->addColumn('id_condicao_pagamento', 'biginteger')
            ->addColumn('numero_parcela', 'integer')
            ->addColumn('dias', 'integer')
            ->addColumn('percentual', 'decimal', ['precision' => 10, 'scale' => 4])

            ->addForeignKey(
                'id_condicao_pagamento',
                'payment_conditions',
                'id',
                ['delete'=> 'CASCADE', 'update'=> 'CASCADE']
            )

            ->create();
    }
}
