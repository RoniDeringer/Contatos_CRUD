<?php

namespace App\Controller;

use App\Entity\Pessoa;
use App\Entity\Contato;
use App\Form\PessoaType;
use App\Repository\ContatoRepository;
use App\Repository\PessoaRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class PessoaController extends AbstractController
{


    /**
     * @Route("/pessoa",name="pessoa_index")
     */
     public function index(PessoaRepository $pessoaRepository, EntityManagerInterface $em): Response
    {
        $data['titulo'] = "Tabela Pessoas";

        /*
        validar se foi passado algo pelo GET
        Se nao eu mostro todas as pessoas
        */
        if (!isset($_GET['nomePesquisado'])) {
            $data['pessoas'] = $pessoaRepository->findAll(); //procura no bd toda as pessoas
            return $this->renderForm('pessoa/index.html.twig', $data);
        }

        $pessoaPesquisada = trim($_GET['nomePesquisado']);  //recebe via GET nome pesquisado

        /*
        query builder:
        */
        /*
            $qb = $em->createQueryBuilder();
            $qb->select(array('p')) // string 'p' is converted to array internally
                ->from(Pessoa::class, 'p')
                ->where($qb->expr()->orX(
                    $qb->expr()->like('p.nome', $pessoaPesquisada)  //, '%'.$pessoaPesquisada.'%')
                ));
        */    
        /*
       pegando dados da querybuilder:
        */
        /*
            $qb->getQuery()->getArrayResult();
            echo $qb;
            $data['pessoas'] = $qb;
        */
        $data['pessoas'] = $pessoaRepository->findBy(['nome' => $pessoaPesquisada]);  //procura no bd o nome pesquisado
        return $this->renderForm('pessoa/index.html.twig',$data);
    }


    /**
     * @Route("/pessoa/adicionar",name="pessoa_adicionar")
     */
    public function adicionar(Request $request, EntityManagerInterface $em): Response
    {
        //request pega os dados do formulario
        //$em gerencia atraves da orm para inserir dados no bd
        $msg    = "";
        $pessoa = new Pessoa();
        $form   = $this->createForm(PessoaType::class, $pessoa);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) { //validação de form em entidades
            $em->persist($pessoa);  //salva na memoria
            $em->flush();  //executa e salva no bd
            $msg = "Pessoa cadastrada com sucesso!";
        }
        $data['titulo'] = 'Adicionar nova Pessoa';
        $data['form']   = $form;
        $data['msg']    = $msg;
        return $this->renderForm('pessoa/form.html.twig', $data);
    }


    /**
     * @Route("/pessoa/editar/{id}",name="pessoa_editar")
     */
    public function editar($id, Request $request, EntityManagerInterface $em, PessoaRepository $pessoaRepository): Response
    {
        $msg    = "";
        $pessoa = $pessoaRepository->find($id);  //retorna o id
        $form   = $this->createForm(PessoaType::class, $pessoa);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            $em->Flush();
            $msg = "Editado com sucesso!";
        }
        $data['titulo'] = 'Editar Pessoa';
        $data['form']   = $form;
        $data['msg']    = $msg;
        return $this->renderForm('pessoa/form.html.twig', $data);
    }


    /**
     * @Route("/pessoa/excluir/{id}",name="pessoa_excluir")
     */
    public function excluir($id, EntityManagerInterface $em, PessoaRepository $pessoaRepository): Response
    {
        $pessoa = $pessoaRepository->find($id);
        $em->remove($pessoa);
        $em->flush();
        return $this->redirectToRoute('pessoa_index');
    }

      /**
     * @Route("/visualizar/{id}",name="pessoa_visualizar")
     */
    public function visualizar($id, ContatoRepository $contatoRepository, PessoaRepository $pessoaRepository): Response
    {
        $data['titulo']   =  "Tabela de Pessoa";
        $data['contatos'] =  $contatoRepository->findBy(['idPessoa' => $id]);
        return $this-> renderForm('visualizar.html.twig', $data);
    }
}
