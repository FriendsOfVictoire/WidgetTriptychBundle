<?php

namespace Victoire\Widget\TriptychBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Col.
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Col
{
    use \Victoire\Bundle\WidgetBundle\Entity\Traits\LinkTrait;
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \Victoire\Bundle\MediaBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="\Victoire\Bundle\MediaBundle\Entity\Media")
     * @ORM\JoinColumn(name="image_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $background;

    /**
     * @var \Victoire\Bundle\MediaBundle\Entity\Media
     *
     * @ORM\ManyToOne(targetEntity="\Victoire\Bundle\MediaBundle\Entity\Media")
     * @ORM\JoinColumn(name="video_preview_id", referencedColumnName="id", onDelete="CASCADE")
     */
    private $videoPreview;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="subTitle", type="string", length=255)
     */
    private $subTitle;

    /**
     * Get id.
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Col
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set subTitle.
     *
     * @param string $subTitle
     *
     * @return Col
     */
    public function setSubTitle($subTitle)
    {
        $this->subTitle = $subTitle;

        return $this;
    }

    /**
     * Get subTitle.
     *
     * @return string
     */
    public function getSubTitle()
    {
        return $this->subTitle;
    }

    /**
     * Set url.
     *
     * @param string $url
     *
     * @return Col
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url.
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set target.
     *
     * @param string $target
     *
     * @return Col
     */
    public function setTarget($target)
    {
        $this->target = $target;

        return $this;
    }

    /**
     * Get target.
     *
     * @return string
     */
    public function getTarget()
    {
        return $this->target;
    }

    /**
     * Set route.
     *
     * @param string $route
     *
     * @return Col
     */
    public function setRoute($route)
    {
        $this->route = $route;

        return $this;
    }

    /**
     * Get route.
     *
     * @return string
     */
    public function getRoute()
    {
        return $this->route;
    }

    /**
     * Set routeParameters.
     *
     * @param array $routeParameters
     *
     * @return Col
     */
    public function setRouteParameters($routeParameters)
    {
        $this->routeParameters = $routeParameters;

        return $this;
    }

    /**
     * Get routeParameters.
     *
     * @return array
     */
    public function getRouteParameters()
    {
        return $this->routeParameters;
    }

    /**
     * Set linkType.
     *
     * @param string $linkType
     *
     * @return Col
     */
    public function setLinkType($linkType)
    {
        $this->linkType = $linkType;

        return $this;
    }

    /**
     * Get linkType.
     *
     * @return string
     */
    public function getLinkType()
    {
        return $this->linkType;
    }

    /**
     * Set analyticsTrackCode.
     *
     * @param string $analyticsTrackCode
     *
     * @return Col
     */
    public function setAnalyticsTrackCode($analyticsTrackCode)
    {
        $this->analyticsTrackCode = $analyticsTrackCode;

        return $this;
    }

    /**
     * Get analyticsTrackCode.
     *
     * @return string
     */
    public function getAnalyticsTrackCode()
    {
        return $this->analyticsTrackCode;
    }

    /**
     * Set background.
     *
     * @param \Victoire\Bundle\MediaBundle\Entity\Media $background
     *
     * @return Col
     */
    public function setBackground(\Victoire\Bundle\MediaBundle\Entity\Media $background = null)
    {
        $this->background = $background;

        return $this;
    }

    /**
     * Get background.
     *
     * @return \Victoire\Bundle\MediaBundle\Entity\Media
     */
    public function getBackground()
    {
        return $this->background;
    }

    /**
     * Set page.
     *
     * @param \Victoire\Bundle\PageBundle\Entity\BasePage $page
     *
     * @return Col
     */
    public function setPage(\Victoire\Bundle\PageBundle\Entity\BasePage $page = null)
    {
        $this->page = $page;

        return $this;
    }

    /**
     * Get page.
     *
     * @return \Victoire\Bundle\PageBundle\Entity\BasePage
     */
    public function getPage()
    {
        return $this->page;
    }

    /**
     * Set attachedWidget.
     *
     * @param \Victoire\Bundle\WidgetBundle\Entity\Widget $attachedWidget
     *
     * @return Col
     */
    public function setAttachedWidget(\Victoire\Bundle\WidgetBundle\Entity\Widget $attachedWidget = null)
    {
        $this->attachedWidget = $attachedWidget;

        return $this;
    }

    /**
     * Get attachedWidget.
     *
     * @return \Victoire\Bundle\WidgetBundle\Entity\Widget
     */
    public function getAttachedWidget()
    {
        return $this->attachedWidget;
    }

    /**
     * @return \Victoire\Bundle\MediaBundle\Entity\Media
     */
    public function getVideoPreview()
    {
        return $this->videoPreview;
    }

    /**
     * @param \Victoire\Bundle\MediaBundle\Entity\Media $videoPreview
     * @return Col
     */
    public function setVideoPreview($videoPreview)
    {
        $this->videoPreview = $videoPreview;
        return $this;
    }
}
