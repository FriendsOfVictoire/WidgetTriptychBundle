<?php

namespace Victoire\Widget\TryptichBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\WidgetBundle\Entity\Widget;

/**
 * WidgetTryptich.
 *
 * @ORM\Table("vic_widget_tryptich")
 * @ORM\Entity
 */
class WidgetTryptich extends Widget
{
    /**
     * @var Col
     *
     * @ORM\OneToOne(targetEntity="Victoire\Widget\TryptichBundle\Entity\Col", cascade={"persist", "remove"})
     */
    protected $colLeft;

    /**
     * @var Col
     *
     * @ORM\OneToOne(targetEntity="Victoire\Widget\TryptichBundle\Entity\Col", cascade={"persist", "remove"})
     */
    protected $colMiddle;

    /**
     * @var Col
     *
     * @ORM\OneToOne(targetEntity="Victoire\Widget\TryptichBundle\Entity\Col", cascade={"persist", "remove"})
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
        return 'Tryptich #'.$this->id;
    }

    /**
     * Set colLeft.
     *
     * @param \Victoire\Widget\TryptichBundle\Entity\Col $colLeft
     *
     * @return WidgetTryptich
     */
    public function setColLeft(\Victoire\Widget\TryptichBundle\Entity\Col $colLeft = null)
    {
        $this->colLeft = $colLeft;

        return $this;
    }

    /**
     * Get colLeft.
     *
     * @return \Victoire\Widget\TryptichBundle\Entity\Col
     */
    public function getColLeft()
    {
        return $this->colLeft;
    }

    /**
     * Set colMiddle.
     *
     * @param \Victoire\Widget\TryptichBundle\Entity\Col $colMiddle
     *
     * @return WidgetTryptich
     */
    public function setColMiddle(\Victoire\Widget\TryptichBundle\Entity\Col $colMiddle = null)
    {
        $this->colMiddle = $colMiddle;

        return $this;
    }

    /**
     * Get colMiddle.
     *
     * @return \Victoire\Widget\TryptichBundle\Entity\Col
     */
    public function getColMiddle()
    {
        return $this->colMiddle;
    }

    /**
     * Set colRight.
     *
     * @param \Victoire\Widget\TryptichBundle\Entity\Col $colRight
     *
     * @return WidgetTryptich
     */
    public function setColRight(\Victoire\Widget\TryptichBundle\Entity\Col $colRight = null)
    {
        $this->colRight = $colRight;

        return $this;
    }

    /**
     * Get colRight.
     *
     * @return \Victoire\Widget\TryptichBundle\Entity\Col
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
