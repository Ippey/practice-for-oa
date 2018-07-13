<?php

namespace App\Repository;

use App\Domain\Repository\ProductManageRepository;
use App\Entity\Product;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

/**
 * @method Product|null find($id, $lockMode = null, $lockVersion = null)
 * @method Product|null findOneBy(array $criteria, array $orderBy = null)
 * @method Product[]    findAll()
 * @method Product[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ProductRepository extends ServiceEntityRepository implements ProductManageRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Product::class);
    }

    /**
     * 追加
     *
     * @param Product $product
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function add(Product $product)
    {
        $this->getEntityManager()->persist($product);
        $this->getEntityManager()->flush();
    }

    /**
     * 更新
     *
     * @param Product $product
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function modify(Product $product)
    {
        $this->getEntityManager()->flush();
    }

    /**
     * 価格更新
     *
     * @param Product $product
     * @param $price
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function modifyPrice(Product $product, $price)
    {
        $product->setPrice($price);
        $this->getEntityManager()->flush();
    }

    /**
     * 在庫更新
     *
     * @param integer $id
     * @param $stock
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function modifyStock($id, $stock)
    {
        $product = $this->find($id);
        $product->setStock($stock);
        $this->getEntityManager()->flush();
    }
}
