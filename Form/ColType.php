<?php

namespace Victoire\Widget\TryptichBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Bundle\CoreBundle\Form\WidgetType;
use Victoire\Bundle\FormBundle\Form\Type\LinkType;
use Victoire\Bundle\MediaBundle\Form\Type\MediaType;

class ColType extends WidgetType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array                $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('title', null, [
                'label' => 'widget_tryptich.col.form.title.label',
            ])
            ->add('subTitle', null, [
                'label' => 'widget_tryptich.col.form.subtitle.label',
            ])
            ->add('background', MediaType::class, [
                'label' => 'widget_tryptich.col.form.background.label',
            ])
            ->add('videoPreview', MediaType::class, [
                'label' => 'widget_tryptich.col.form.video_preview.label',
                'required' => false
            ])
            ->add('link', LinkType::class)
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'Victoire\Widget\TryptichBundle\Entity\Col',
        ));
    }

    /**
     * @return string
     */
    public function getBlockPrefix()
    {
        return 'victoire_widget_form_tryptich_col';
    }
}
