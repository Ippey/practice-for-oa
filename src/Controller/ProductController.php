<?php

namespace App\Controller;

use App\Service\ProductService;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class ProductController extends Controller
{
    /** @var ProductService  */
    private $service;

    public function __construct(ProductService $service)
    {
        $this->service = $service;
    }

    /**
     * @Route("/item/{id}/modify_stock", name="item_modify_stock")
     * @param integer $id
     * @param Request $request
     * @return Response
     */
    public function index($id, Request $request)
    {
        $this->service->modifyStockByRequest($id, $request);
        return $this->redirectToRoute('item_show', ['id' => $id]);
    }

    /**
     * @Route("/item/{id}/", name="item_show")
     * @param integer $id
     * @return Response
     */
    public function show($id)
    {
        $row = $this->service->get($id);
        $str = $row->getName() . ' | ' . $row->getPrice() . ' | ' . $row->getStock();
        return new Response($str);
    }
}
