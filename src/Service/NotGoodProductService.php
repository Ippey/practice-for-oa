<?php
/**
 * Created by PhpStorm.
 * User: ippei
 * Date: 2018/05/21
 * Time: 16:39
 */

namespace App\Service;


use App\Repository\ProductRepository;
use Symfony\Component\HttpFoundation\Request;

class NotGoodProductService
{

    /** @var ProductRepository */
    private $repository;

    public function __construct(ProductRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * 更新
     *
     * @param integer $id
     * @param Request $request
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function modifyStockByRequest($id, Request $request)
    {
        $product = $this->repository->find($id);
        $product->setStock($request->get('stock'));
        $product->setPrice($request->get('price')); // 間違って価格を更新

        $this->repository->modify($product);
    }
}