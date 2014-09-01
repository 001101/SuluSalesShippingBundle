<?php
/*
 * This file is part of the Sulu CMS.
 *
 * (c) MASSIVE ART WebServices GmbH
 *
 * This source file is subject to the MIT license that is bundled
 * with this source code in the file LICENSE.
 */

namespace Sulu\Bundle\Sales\ShippingBundle\Controller;

use FOS\RestBundle\Routing\ClassResourceInterface;
use Hateoas\Representation\CollectionRepresentation;
use Sulu\Component\Rest\Exception\EntityNotFoundException;
use Sulu\Component\Rest\Exception\MissingArgumentException;
use Sulu\Component\Rest\Exception\RestException;
use Sulu\Component\Rest\ListBuilder\Doctrine\DoctrineListBuilderFactory;
use Sulu\Component\Rest\ListBuilder\Doctrine\DoctrineListBuilder;
use Sulu\Component\Rest\ListBuilder\Doctrine\FieldDescriptor\DoctrineFieldDescriptor;
use Sulu\Component\Rest\ListBuilder\Doctrine\FieldDescriptor\DoctrineJoinDescriptor;
use Sulu\Component\Rest\ListBuilder\ListRepresentation;
use Sulu\Component\Rest\RestController;
use Sulu\Component\Rest\RestHelperInterface;
use Symfony\Component\HttpFoundation\Request;
use FOS\RestBundle\Controller\Annotations\Post;

/**
 * Makes orders available through a REST API
 *
 * @package Sulu\Bundle\Sales\OrderBundle\Controller
 */
class ShippingController extends RestController implements ClassResourceInterface
{

    protected static $orderEntityName = 'SuluSalesOrderBundle:Order';
    protected static $orderStatusEntityName = 'SuluSalesOrderBundle:OrderStatus';

    protected static $entityKey = 'orders';

    /**
     * @return OrderManager
     */
    private function getManager()
    {
        return $this->get('sulu_sales_order.order_manager');
    }

    /**
     * returns all fields that can be used by list
     *
     * @param Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function fieldsAction(Request $request)
    {
        $locale = $this->getLocale($request);

        // default contacts list
        return $this->handleView($this->view(array_values($this->getManager()->getFieldDescriptors($locale)), 200));
    }

    /**
     * @param Request $request
     * @return mixed
     */
    public function cgetAction(Request $request)
    {
//        $filter = array();
//
//        $locale = $this->getLocale($request);
//
//        $status = $request->get('status');
//        if ($status) {
//            $filter['status'] = $status;
//        }
//
//        if ($request->get('flat') == 'true') {
//            /** @var RestHelperInterface $restHelper */
//            $restHelper = $this->get('sulu_core.doctrine_rest_helper');
//
//            /** @var DoctrineListBuilderFactory $factory */
//            $factory = $this->get('sulu_core.doctrine_list_builder_factory');
//
//            /** @var DoctrineListBuilder $listBuilder */
//            $listBuilder = $factory->create(self::$orderEntityName);
//
//            $restHelper->initializeListBuilder($listBuilder, $this->getManager()->getFieldDescriptors($locale));
//
//            foreach ($filter as $key => $value) {
//                $listBuilder->where($this->getManager()->getFieldDescriptor($key), $value);
//            }
//
//            // exclude in cart orders
//            $listBuilder->whereNot($this->getStatusFieldDescriptor(), OrderStatus::STATUS_IN_CART);
//
//            $list = new ListRepresentation(
//                $listBuilder->execute(),
//                self::$entityKey,
//                'get_orders',
//                $request->query->all(),
//                $listBuilder->getCurrentPage(),
//                $listBuilder->getLimit(),
//                $listBuilder->count()
//            );
//        } else {
//            $list = new CollectionRepresentation(
//                $this->getManager()->findAllByLocale($this->getLocale($request), $filter),
//                self::$entityKey
//            );
//        }
//
//        $view = $this->view($list, 200);
//
//        return $this->handleView($view);
    }

    /**
     * Retrieves and shows an order with the given ID
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param integer $id order ID
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function getAction(Request $request, $id)
    {
//        $locale = $this->getLocale($request);
//        $view = $this->responseGetById(
//            $id,
//            function ($id) use ($locale) {
//                /** @var Order $order */
//                $order = $this->getManager()->findByIdAndLocale($id, $locale);
//
//                return $order;
//            }
//        );
//
//        return $this->handleView($view);
    }

    /**
     * Creates and stores a new order.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function postAction(Request $request)
    {
//        try {
//            $order = $this->getManager()->save(
//                $request->request->all(),
//                $this->getLocale($request),
//                $this->getUser()->getId()
//            );
//
//            $view = $this->view($order, 200);
//        } catch (OrderDependencyNotFoundException $exc) {
//            $exception = new EntityNotFoundException($exc->getEntityName(), $exc->getId());
//            $view = $this->view($exception->toArray(), 400);
//        } catch (MissingOrderAttributeException $exc) {
//            $exception = new MissingArgumentException(self::$orderEntityName, $exc->getAttribute());
//            $view = $this->view($exception->toArray(), 400);
//        }
//
//        return $this->handleView($view);
    }

    /**
     * Change a order.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param integer $id order ID
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function putAction(Request $request, $id)
    {
//        try {
//            $order = $this->getManager()->save(
//                $request->request->all(),
//                $this->getLocale($request),
//                $this->getUser()->getId(),
//                $id
//            );
//
//            $view = $this->view($order, 200);
//        } catch (OrderNotFoundException $exc) {
//            $exception = new EntityNotFoundException($exc->getEntityName(), $exc->getId());
//            $view = $this->view($exception->toArray(), 404);
//        } catch (OrderDependencyNotFoundException $exc) {
//            $exception = new EntityNotFoundException($exc->getEntityName(), $exc->getId());
//            $view = $this->view($exception->toArray(), 400);
//        } catch (MissingOrderAttributeException $exc) {
//            $exception = new MissingArgumentException(self::$orderEntityName, $exc->getAttribute());
//            $view = $this->view($exception->toArray(), 400);
//        } catch (OrderException $exc) {
//            $exception = new RestException($exc->getMessage());
//            $view = $this->view($exception->toArray(), 400);
//        }
//
//        return $this->handleView($view);
    }

    /**
     * @Post("/orders/{id}")
     */
    public function postTriggerAction($id, Request $request)
    {
//        $status = $request->get('action');
//        $em = $this->getDoctrine()->getManager();
//
//        try {
//            $order = $this->getManager()->findByIdAndLocale($id, $this->getLocale($request));
//
//            switch ($status) {
//                case 'confirm':
//                    $this->getManager()->convertStatus($order, OrderStatus::STATUS_CONFIRMED);
//                    break;
//                case 'edit':
//                    $this->getManager()->convertStatus($order, OrderStatus::STATUS_CREATED);
//                    break;
//                default:
//                    throw new RestException("Unrecognized status: " . $status);
//
//            }
//
//            $em->flush();
//            $view = $this->view($order, 200);
//        } catch (OrderNotFoundException $exc) {
//            $exception = new EntityNotFoundException($exc->getEntityName(), $exc->getId());
//            $view = $this->view($exception->toArray(), 404);
//        }
//
//        return $this->handleView($view);
    }

    /**
     * Delete an order with the given id.
     *
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param integer $id orderid
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function deleteAction(Request $request, $id)
    {
        $locale = $this->getLocale($request);

        $delete = function ($id) use ($locale) {
            $this->getManager()->delete($id, $this->getUser()->getId());
        };
        $view = $this->responseDelete($id, $delete);

        return $this->handleView($view);
    }

    /**
     * returns field-descriptor if status
     * @return DoctrineFieldDescriptor
     */
    private function getStatusFieldDescriptor()
    {
//        return new DoctrineFieldDescriptor(
//            'id',
//            'status',
//            self::$orderStatusEntityName,
//            'salesorder.orders.status',
//            array(
//                self::$orderStatusEntityName => new DoctrineJoinDescriptor(
//                        self::$orderStatusEntityName,
//                        self::$orderEntityName . '.status'
//                    )
//            )
//        );
    }

}
