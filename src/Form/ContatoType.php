<?php
namespace App\Form;

use App\Entity\Pessoa;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;

class ContatoType extends AbstractType{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
        ->add('tipo',ChoiceType::class,[
            'choices' => [
                'Email'     => '1', 
                'Telefone'  => '0',
                /*
                ele armazena esses valores 1 e 0
                mas na hora de mostrar eu mostro email e telefone
                */
            ],
            'label' => 'tipo de contato: '
        ])
       
        ->add('descricao',TextType::class,
        ['label' => 'descrição do contato: '])
        
        ->add('idPessoa', EntityType::class,[
            'class'        => Pessoa::class,
            'choice_label' => 'nome',
            'label'        =>'Nome do contato: '
        ])

        ->add('Salvar',SubmitType::class);  
    }
}