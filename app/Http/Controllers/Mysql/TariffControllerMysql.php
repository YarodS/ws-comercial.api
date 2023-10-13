<?php

namespace App\Http\Controllers\Mysql;

use App\Helpers\ResponseHelper;
use App\Models\Mysql\Tariff\Commands\TariffModel;

class TariffControllerMysql extends Controller
{
    private $ResponseHelper;
    private $TariffModel;

    function __construct()
    {
        $this->ResponseHelper = new ResponseHelper();
        $this->TariffModel = new TariffModel();
    }

    public function tariff_id_customer(string $p_id_customer)
    {
        $res = $this->TariffModel->get_tariff_id_customer([
            'p_id_customer' => $p_id_customer
        ]);

        if (!$res) {
            return $this->ResponseHelper->notExistsInformation([
                'message' => 'No se encontro información.'
            ]);
        } else {
            return $this->ResponseHelper->success(['data' => $res ? $res : []]);
        }
    }
}
