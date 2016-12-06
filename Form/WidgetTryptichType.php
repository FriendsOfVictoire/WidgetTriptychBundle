<?php

namespace Victoire\Widget\TryptichBundle\Form;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Bundle\CoreBundle\Form\WidgetType;

/**
 * WidgetTryptich form type.
 */
class WidgetTryptichType extends WidgetType
{
    /**
     * define form fields.
     *
     * @param FormBuilderInterface $builder
     *
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('colLeft', ColType::class, array(
                    'label' => 'widget_tryptich.form.colLeft.label',
            ))
            ->add('colMiddle', ColType::class, array(
                    'label' => 'widget_tryptich.form.colMiddle.label',
            ))
            ->add('colRight', ColType::class, array(
                    'label' => 'widget_tryptich.form.colRight.label',
            ));
        parent::buildForm($builder, $options);
    }

    /**
     * bind form to WidgetTryptich entity.
     *
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => 'Victoire\Widget\TryptichBundle\Entity\WidgetTryptich',
            'widget' => 'Tryptich',
            'translation_domain' => 'victoire',
        ));
    }

    /**
     * get form name.
     *
     * @return string The form name
     */
    public function getBlockPrefix()
    {
        return 'victoire_widget_form_tryptich';
    }
}
