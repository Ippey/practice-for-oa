<?php

namespace App\Controller;

use App\Service\NotGoodProductService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class NotGoodProductController extends Controller
{
    /** @var NotGoodProductService  */
    private $service;

    public function __construct(NotGoodProductService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route("/item/{id}/modify_stock_ng", name="item_modify_stock_not_good")
     * @param integer $id
     * @param Request $request
     * @return Response $response
     * @throws \Doctrine\ORM\ORMException
     * @throws \Doctrine\ORM\OptimisticLockException
     */
    public function index($id, Request $request)
    {
        $this->service->modifyStockByRequest($id, $request);
        return $this->redirectToRoute('item_show', ['id' => $id]);
    }
}
