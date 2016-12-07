<?php

namespace Victoire\Widget\TriptychBundle\Resolver;

use Victoire\Bundle\WidgetBundle\Model\Widget;
use Victoire\Bundle\WidgetBundle\Resolver\BaseWidgetContentResolver;

/***
 * Class WidgetTriptychContentResolver
 * @package Victoire\Widget\TriptychBundle\Resolver
 */
class WidgetTriptychContentResolver extends BaseWidgetContentResolver
{
    /**
     * Get the business entity content.
     *
     * @param Widget $widget
     *
     * @return string
     */
    public function getWidgetBusinessEntityContent(Widget $widget)
    {
        $entity = $widget->getEntity();
        $parameters = $this->getWidgetStaticContent($widget);

        $this->populateParametersWithWidgetFields($widget, $entity, $parameters);

        return $parameters;
    }

    /**
     * Get the content of the widget for the query mode.
     *
     * @param Widget $widget
     *
     * @return string
     */
    public function getWidgetQueryContent(Widget $widget)
    {
        $parameters = $this->getWidgetStaticContent($widget);

        $entities = $this->getWidgetQueryBuilder($widget)
            ->setMaxResults(3)
            ->getQuery()
            ->getResult();
        $cols = ["colLeft", "colMiddle", "colRight"];

        foreach ($entities as $key => $entity) {
            $parameters[$cols[$key]] = null;
            $this->populateParametersWithWidgetFields($widget, $entity, $parameters[$cols[$key]]);
        }

        return $parameters;
    }

    public function populateParametersWithBusinessLink($widget, $entity, &$parameters)
    {
        $fields = $widget->getFields();

        foreach ($fields as $widgetField => $field) {

            if ($entity !== null) {
                $attributeValue = $entity->getEntityAttributeValue($field);
            } else {
                $attributeValue = $widget->getBusinessEntityId().' -> '.$field;
            }

            $parameters[$widgetField] = $attributeValue;
        }
    }
}