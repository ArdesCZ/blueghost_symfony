<?php

namespace App\Form;

use App\Entity\Kontakt;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

//Formulář se vytváří automaticky zadáním příkazu symfony console make:form, dál postupovat dle průvodce
class KontaktFormularType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        // všechny formulářové typy jsou zde https://symfony.com/doc/current/reference/forms/types.html
        $builder
        // toto nahrazuje <input type="text" class="form-control" name="jmeno">
            ->add('jmeno', TextType::class, [
                // vypínám formulářový titulek, neboť používám vlastní s css styly
                'label' => false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ])
            ->add('prijmeni', TextType::class, [
                'label' => false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ])
            ->add('telefonniCislo',IntegerType::class,[
                'label' => false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ])
            ->add('email', EmailType::class, [
                'label' => false,
                'attr' => array(
                    'class' => 'form-control'
                )
            ])
            // zde je více atributů a nahrazuje <textarea name="poznamka" rows="4" class="form-control"></textarea>
            ->add('poznamka', TextareaType::class, [
                'label' => false,
                'attr' => array(
                    'class' => 'form-control',
                    'rows' => '4'
                )
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Kontakt::class,
        ]);
    }
}
