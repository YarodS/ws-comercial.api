<?php

namespace App\Models\Mysql\Tariff\Commands;

use App\Models\Mysql\DbModel;

class TariffModel extends DbModel
{
    public function get_tariff_id_customer($params = [])
    {
        $prepare = $this->pdo->prepare('call sp_get_tariff_id_customer(:p_id_customer)');
        $prepare->bindValue(':p_id_customer', $params['p_id_customer']);
        $prepare->execute();
        return $prepare->fetchall(\PDO::FETCH_ASSOC);
    }
}
