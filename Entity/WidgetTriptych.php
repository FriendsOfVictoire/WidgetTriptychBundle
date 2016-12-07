<?php

namespace Victoire\Widget\TriptychBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Victoire\Bundle\WidgetBundle\Entity\Widget;
use Victoire\Widget\TriptychBundle\Entity\Col;
use Victoire\Bundle\CoreBundle\Annotations as VIC;

/**
 * WidgetTriptych.
 *
 * @ORM\Table("vic_widget_tryptich")
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
     * @var bool
     *
     * @ORM\Column(name="randomResults", type="boolean", nullable=true)
     */
    protected $randomResults;

    /**
     * @var string
     *
     * @VIC\ReceiverProperty("imageable")
     */
    protected $background;

    /**
     * @var string
     *
     * @VIC\ReceiverProperty("textable")
     */
    protected $subtitle;

    /**
     * @var string
     *
     * @VIC\ReceiverProperty("textable")
     */
    protected $title;

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

    /**
     * @return boolean
     */
    public function isRandomResults()
    {
        return $this->randomResults;
    }

    /**
     * @param boolean $randomResults
     * @return WidgetTriptych
     */
    public function setRandomResults($randomResults)
    {
        $this->randomResults = $randomResults;
        return $this;
    }

    /**
     * @return string
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * @param string $background
     * @return WidgetTriptych
     */
    public function setBackground($background)
    {
        $this->background = $background;
        return $this;
    }

    /**
     * @return string
     */
    public function getSubtitle()
    {
        return $this->subtitle;
    }

    /**
     * @param string $subtitle
     * @return WidgetTriptych
     */
    public function setSubtitle($subtitle)
    {
        $this->subtitle = $subtitle;
        return $this;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param string $title
     * @return WidgetTriptych
     */
    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }
}
