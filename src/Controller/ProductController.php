<?php

namespace App\Controller;

use App\Entity\Product;
use Doctrine\ORM\EntityManagerInterface;
use App\Repository\ProductRepository;
use http\Env\Request;
use Symfony\Component\Validator\Validator\ValidatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\IsGranted;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Security;

class ProductController extends AbstractController
{
    /**
     * @Route("/product", name="create_product")
     */
    public function createProduct(ValidatorInterface $validator): Response
    {
        $entityManager = $this->getDoctrine()->getManager();

        $product = new Product();
        $product->setName('Keyboard');
        $product->setPrice(1999);
        $product->setDescription('Ergonomic and stylish!');

        // tell Doctrine you want to (eventually) save the Product (no queries yet)
        $entityManager->persist($product);

        // actually executes the queries (i.e. the INSERT query)
        $entityManager->flush();

        $errors = $validator->validate($product);
        if (count($errors) > 0)
        {
            return new Response((string) $errors, 400);
        }

        return new Response('Saved new product with id '.$product->getId());
    }

//    /**
//     * @Route("/product/{id}", name="product_show")
//     */
//    public function show(int $id): Response
//    {
//        $product = $this->getDoctrine()
//            ->getRepository(Product::class)
//            ->find($id);
//
//        if (!$product) {
//            throw $this->createNotFoundException(
//                'No product found for id '.$id
//            );
//        }
//
//        return new Response('Check out this great product: '.$product->getName());
//
//        // or render a template
//        // in the template, print things with {{ product.name }}
//        // return $this->render('product/show.html.twig', ['product' => $product]);
//    }

    /**
     * @Route("/product/Greater", name="product_greater")
     */

    public function allGreat(): Response
    {
        $minprice = 3000;

        $products = $this->getDoctrine()
            ->getRepository(Product::class)
            ->findAllGreaterThanPrice($minprice);

        echo '<pre>';
        print_r($products);
        echo '</pre>';

        return new Response('All prices lower than 3000');
    }


    /**
     * @Route("/product/{id}", name="product_show")
     */
    public function show(Product $product): Response
    {

        if (!$product) {
            throw $this->createNotFoundException(
                'No product found for id ' . $product.id
            );
        }

        return new Response('Check out this great product: ' . $product->getName());
    }

    /**
     * @Route("/product/edit/{id}")
     */

    public function update(int $id): Response{
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if(!$product)
        {
            throw $this->createNotFoundException(
                'No product found for id'.$id
            );
        }

        $product->setName('Snickers');
        $product->setPrice(2000);
        $product->setDescription('Nike');
        $entityManager->flush();

        return $this->redirectToRoute('product_show', [
            'id' => $product->getId()
        ]);

    }

    /**
     * @Route("/product/delete/{id}")
     */

    public function delete(int $id): Response{
        $entityManager = $this->getDoctrine()->getManager();
        $product = $entityManager->getRepository(Product::class)->find($id);

        if(!$product)
        {
            throw $this->createNotFoundException(
                'No product found for id'.$id
            );
        }

        $entityManager->remove($product);
        $entityManager->flush();

        return new Response(
            'Product '.$product->getName().' sold'
        );

    }


}
