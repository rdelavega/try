<?php

namespace App\Controller;

use App\Entity\Post;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use App\Repository\PostRepository;
use App\Form\PostType;
use Symfony\Component\HttpFoundation\Request;
use App\Services\FileUploader;

/**
 * @Route("/post", name="post.")
 */
class PostController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index()
    {
        $posts = $this->getDoctrine()->getRepository(Post::class)->findAll();


        return $this->render('post/index.html.twig', [
            'posts' => $posts,
        ]);
    }

    /**
     * @Route("/create", name="create")
     */
    public function create(Request $request, FileUploader $fileUploader)
    {
        $post = new Post();

        $form = $this->createForm(PostType::class, $post);

        // $request = $this->getDoctrine()->getRepository(Post::class);

        $form->handleRequest($request);

        if ($form->isSubmitted()) {
          $em = $this->getDoctrine()->getManager();
          $file = $request->files->get('post')['attachment'];

          /** @var UploadedFile $file */
          if($file) {
            $filename =  $fileUploader->uploadFile($file);

            $post->setImage($filename);

            $em->persist($post);
            $em->flush();
          }

          return $this->redirect($this->generateUrl('post.index'));
        }

        return $this->render('post/create.html.twig', [
            'form' => $form->createView(),
        ]);
    }

    /**
     * @Route("/show/{id}", name="show")
     */
    public function show($id)
    {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);

        return $this->render('post/show.html.twig', [
            'post' => $post,
        ]);
    }

    /**
     * @Route("/delete/{id}", name="delete")
     */
    public function delete($id)
    {
        $post = $this->getDoctrine()->getRepository(Post::class)->find($id);

        $em = $this->getDoctrine()->getManager();

        $em->remove($post);
        $em->flush();

        return $this->redirect($this->generateUrl('post.index'));
    }
}
