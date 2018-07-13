<?php
/**
 * Created by PhpStorm.
 * User: ippei
 * Date: 2018/05/21
 * Time: 16:36
 */

namespace App\Domain\Repository;


interface ProductManageRepository
{
    /**
     * @param $id
     * @return mixed
     */
    public function find($id);

    /**
     * @param integer $id
     * @param $stock
     * @return mixed
     */
    public function modifyStock($id, $stock);
}