<?php

namespace App\Form;

use App\Entity\ContactArea;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TelType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Validator\Constraints\Length;

class UserType extends AbstractType
{
    
    private $db;

    public function __construct( EntityManagerInterface $db )
    {
        $this->db = $db;
    }
    
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
            ->add('email', EmailType::class, [
                'attr' => ['placeholder' => 'ej: user@mail.com'],
            ])
            ->add('password', PasswordType::class, [
                'attr' => ['placeholder' => 'Write your pass'],
            ])
            ->add('name', TextType::class, [
                'attr' => ['placeholder' => 'Write your Name'],
            ])
            ->add('last_name', TextType::class, [
                'attr' => ['placeholder' => 'Write your Last'],
            ])
            ->add('phone_number', TelType::class, [
                'attr' => ['placeholder' => 'Write a phone number'],
            ])
            ->add('contactArea', EntityType::class,[
                'class' => ContactArea::class,
                'choice_label' => 'area_name',
            ] )
            ->add('mensaje', TextareaType::class)
            ->add('submit', Submittype::class)
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
