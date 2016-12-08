<?php

namespace Victoire\Widget\TriptychBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\WidgetBundle\Entity\Widget;
use Victoire\Widget\TriptychBundle\Entity\Col;

/**
 * WidgetTriptych.
 *
 * @ORM\Table("vic_widget_triptych")
 * @ORM\Entity
 */
class WidgetTriptych extends Widget
{
    /**
     * @var Col
     *
     * @ORM\OneToOne(targetEntity="Victoire\Widget\TriptychBundle\Entity\Col", cascade={"persist", "remove"})
     */
    protected $colLeft;

    /**
     * @var Col
     *
     * @ORM\OneToOne(targetEntity="Victoire\Widget\TriptychBundle\Entity\Col", cascade={"persist", "remove"})
     */
    protected $colMiddle;

    /**
     * @var Col
     *
     * @ORM\OneToOne(targetEntity="Victoire\Widget\TriptychBundle\Entity\Col", cascade={"persist", "remove"})
     */
    protected $colRight;

    /**
     * To String function
     * Used in render choices type (Especially in VictoireWidgetRenderBundle)
     * //TODO Check the generated value and make it more consistent.
     *
     * @return string
     */
    public function __toString()
    {
        return 'Triptych #'.$this->id;
    }

    /**
     * Set colLeft.
     *
     * @param Col $colLeft
     *
     * @return WidgetTriptych
     */
    public function setColLeft(Col $colLeft = null)
    {
        $this->colLeft = $colLeft;

        return $this;
    }

    /**
     * Get colLeft.
     *
     * @return Col
     */
    public function getColLeft()
    {
        return $this->colLeft;
    }

    /**
     * Set colMiddle.
     *
     * @param Col $colMiddle
     *
     * @return WidgetTriptych
     */
    public function setColMiddle(Col $colMiddle = null)
    {
        $this->colMiddle = $colMiddle;

        return $this;
    }

    /**
     * Get colMiddle.
     *
     * @return Col
     */
    public function getColMiddle()
    {
        return $this->colMiddle;
    }

    /**
     * Set colRight.
     *
     * @param Col $colRight
     *
     * @return WidgetTriptych
     */
    public function setColRight(Col $colRight = null)
    {
        $this->colRight = $colRight;

        return $this;
    }

    /**
     * Get colRight.
     *
     * @return Col
     */
    public function getColRight()
    {
        return $this->colRight;
    }

    /**
     * Get asynchronous.
     *
     * @return bool
     */
    public function getAsynchronous()
    {
        return $this->asynchronous;
    }
}
