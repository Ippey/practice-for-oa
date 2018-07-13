<?php
/**
 * Created by PhpStorm.
 * User: ippei
 * Date: 2018/05/21
 * Time: 16:38
 */

namespace App\Service;


use App\Domain\Repository\ProductManageRepository;
use App\Entity\Product;
use Symfony\Component\HttpFoundation\Request;

class ProductService
{
    /** @var ProductManageRepository */
    private $repository;

    public function __construct(ProductManageRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * @param integer $id
     * @return Product $row
     */
    public function get($id)
    {
        $row = $this->repository->find($id);
        return $row;
    }

    /**
     * 更新
     *
     * @param integer$id
     * @param Request $request
     */
    public function modifyStockByRequest($id, Request $request)
    {
        $product = $this->repository->find($id);
        $product->setStock($request->get('stock'));
        $this->repository->modifyPrice($product, 10000000000); // こちらはI/Fにメソッドがないのでワーニングが出る
        $this->repository->modifyStock($id, $request->get('stock')); // こちらはI/Fにメソッドがあるのでワーニングが出ない
    }
}