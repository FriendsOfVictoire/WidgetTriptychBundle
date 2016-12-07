<?php

namespace Victoire\Widget\TriptychBundle\Form;

use Doctrine\ORM\EntityRepository;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\Extension\Core\Type\CollectionType;
use Symfony\Component\Form\Extension\Core\Type\HiddenType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\FormEvent;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Victoire\Bundle\BusinessPageBundle\Entity\BusinessTemplate;
use Victoire\Bundle\CoreBundle\Form\EntityProxyFormType;
use Victoire\Bundle\CoreBundle\Form\WidgetFieldsFormType;
use Victoire\Bundle\CoreBundle\Form\WidgetType;
use Victoire\Bundle\WidgetBundle\Entity\Widget;

/**
 * Class WidgetTriptychType
 * @package Victoire\Widget\TriptychBundle\Form
 *
 *  WidgetTriptych form type.
 */
class WidgetTriptychType extends WidgetType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     * @throws \Exception
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        if ($options['businessEntityId'] !== null) {
            if ($options['namespace'] === null) {
                throw new \Exception('The namespace is mandatory if the business_entity_id is given.');
            }
        }

        if ($options['mode'] === Widget::MODE_STATIC) {
            $builder
                ->add('colLeft', ColType::class, array(
                    'label' => 'widget_triptych.form.colLeft.label',
                ))
                ->add('colMiddle', ColType::class, array(
                    'label' => 'widget_triptych.form.colMiddle.label',
                ))
                ->add('colRight', ColType::class, array(
                    'label' => 'widget_triptych.form.colRight.label',
                ));
            parent::buildForm($builder, $options);
        }

        if ($options['mode'] === Widget::MODE_ENTITY) {
            $builder
                ->add('slot', HiddenType::class);
            $this->addEntityFields($builder, $options);
        }

        if ($options['mode'] === Widget::MODE_QUERY) {
            $this->addQueryFields($builder, $options);
        }

        if ($options['mode'] === Widget::MODE_BUSINESS_ENTITY) {
            $this->addBusinessEntityFields($builder, $options);
        }

        //add the mode to the form
        $builder->add('mode', HiddenType::class, [
            'data' => $options['mode'],
        ]);

        //add the slot to the form
        $builder->add('slot', HiddenType::class);
        $this->addCriteriasFields($builder, $options);
    }

    /**
     * Add the fields to the form for the query mode.
     *
     * @param FormInterface|FormBuilderInterface $form
     * @param array                              $options
     */
    protected function addQueryFields($form, $options)
    {
        $form->add('randomResults', null, [
            'attr' => [
                'data-refreshOnChange' => 'true',
            ],
        ]);

        $form->add('businessTemplate', EntityType::class, [
            'class' => BusinessTemplate::class,
            'query_builder' => function (EntityRepository $er) use($options) {
                return $er->createQueryBuilder('bt')
                    ->where('bt.businessEntityId = :businessEntity')
                    ->setParameter(':businessEntity', $options['businessEntityId'])
                    ->orderBy('bt.backendName', 'DESC');
            },
            'placeholder' => '',
            'choice_label' => 'backendName'
        ]);

        $form->addEventListener(
            FormEvents::PRE_SET_DATA,
            function (FormEvent $event) {
                self::disableOrderBy($event->getForm(), $event->getData()->isRandomResults());
            }
        );

        $form->addEventListener(
            FormEvents::PRE_SUBMIT,
            function (FormEvent $event) {
                $data = $event->getData();
                $randomResults = isset($data['randomResults']) ? $data['randomResults'] : false;
                self::disableOrderBy($event->getForm(), $randomResults);
            }
        );

        parent::addQueryFields($form, $options);
    }

    /* Disable orderBy field if random checkbox is checked */
    protected function disableOrderBy(FormInterface $form, $randomResults)
    {
        switch ($randomResults) {
            case true:
                $form->remove('orderBy');
                break;
            default:
                $form->add('orderBy', null, [
                    'required' => false,
                    'attr'     => [
                        'placeholder' => '[{"by": "name", "order": "DESC"}, {"by": "address", "order": "ASC"}]',
                    ],
                ]);
                break;
        }
    }

    /**
     * bind form to WidgetTriptych entity.
     *
     * @param OptionsResolverInterface $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        parent::configureOptions($resolver);

        $resolver->setDefaults(array(
            'data_class' => 'Victoire\Widget\TriptychBundle\Entity\WidgetTriptych',
            'widget' => 'Triptych',
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
        return 'victoire_widget_form_triptych';
    }
}
