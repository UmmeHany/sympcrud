<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;


class PostController extends Controller
{
	/**
     * @Route("/post", name="view_all_post")
     */
	public function shoeAllPostAction(Request $request)
    {
        // replace this example code with whatever you need
        $repository = $this->getDoctrine()->getRepository('AppBundle:Post');
        $posts = $repository->findAll();
        ////$conn = $this->get('database_connection');
        //$str = "SELECT title FROM post where id = 1";
        //$posts = $conn->fetchAll($str);

        /*$dql = 'SELECT cat.id,cat.title,rat.description FROM AppBundle\Entity\Post cat inner join AppBundle\Entity\Rating rat where cat.rating_id = rat.id ';

        $query = $this->getDoctrine()->getManager()->createQuery($dql);
        $posts = $query->execute();
        */

       // $qb = $repository->createQueryBuilder('cat')
          //  ->addOrderBy('cat.title', 'ASC');
        $qb = $this->entityManager->createQueryBuilder();

            $qb
        ->select('a', 'u')
        ->from('AppBundle\Entity\Post', 'p')
        ->leftJoin('p.rating_id', 'u.id');

        $queryBuilder->innerJoin(
    Project::class,    // Entity
    'p',               // Alias
    Join::WITH,        // Join type
    'p.id = c.project' // Join columns
);

            
			        
        $query = $qb->getQuery();
        echo "<pre>";
        print_r($query->execute());
        echo "</pre>";
        exit;

        return $this->render('pages/index.html.twig',['posts' => $posts]);
    }

    /**
     * @Route("/view/{id}", name="view_single_post")
     */
	public function shoeSinglePostAction($id)
    {
        // replace this example code with whatever you need
        //$repository = $this->getDoctrine()->getRepository('AppBundle:Post');
        //$posts = $repository->findAll();
        ////$conn = $this->get('database_connection');
        //$str = "SELECT title FROM post where id = 1";
        //$posts = $conn->fetchAll($str);
       /* echo "<pre>";
        print_r($posts);
        echo "</pre>";
        exit;*/

        $repository = $this->getDoctrine()->getRepository('AppBundle:Post');
        $post = $repository->find($id);

        return $this->render('pages/view_single.html.twig',['post' => $post]);
    }
}
