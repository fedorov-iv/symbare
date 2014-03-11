<?php

namespace IFabrikator\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * Site
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IFabrikator\Bundle\CoreBundle\Entity\SiteRepository")
 */
class Site
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="title", type="string", length=255)
     */
    private $title;

    /**
     * @var string
     *
     * @ORM\Column(name="host", type="string", length=255)
     */
    private $host;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_default", type="boolean")
     */
    private $isDefault;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;


    /**
     * @ORM\OneToMany(targetEntity="SiteAlias", mappedBy="site", cascade={"persist", "remove"})
     */
    private $siteAliases;

    /**
     * @ORM\OneToMany(targetEntity="Page", mappedBy="site", cascade={"persist", "remove"})
     */
    private $pages;


    public function __construct() {
        $this->siteAliases = new ArrayCollection();
        $this->pages = new ArrayCollection();

    }


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set title
     *
     * @param string $title
     * @return Site
     */
    public function setTitle($title)
    {
        $this->title = $title;
    
        return $this;
    }

    /**
     * Get title
     *
     * @return string 
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set host
     *
     * @param string $host
     * @return Site
     */
    public function setHost($host)
    {
        $this->host = $host;
    
        return $this;
    }

    /**
     * Get host
     *
     * @return string 
     */
    public function getHost()
    {
        return $this->host;
    }

    /**
     * Set isDefault
     *
     * @param boolean $isDefault
     * @return Site
     */
    public function setIsDefault($isDefault)
    {
        $this->isDefault = $isDefault;
    
        return $this;
    }

    /**
     * Get isDefault
     *
     * @return boolean 
     */
    public function getIsDefault()
    {
        return $this->isDefault;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Site
     */
    public function setIsActive($isActive)
    {
        $this->isActive = $isActive;

        return $this;
    }

    /**
     * Get isActive
     *
     * @return boolean
     */
    public function getIsActive()
    {
        return $this->isActive;
    }

    /**
     * Add siteAliases
     *
     * @param \IFabrikator\Bundle\CoreBundle\Entity\SiteAlias $siteAliases
     * @return Site
     */
    public function addSiteAliase(\IFabrikator\Bundle\CoreBundle\Entity\SiteAlias $siteAliases)
    {
        $this->siteAliases[] = $siteAliases;
    
        return $this;
    }

    /**
     * Remove siteAliases
     *
     * @param \IFabrikator\Bundle\CoreBundle\Entity\SiteAlias $siteAliases
     */
    public function removeSiteAliase(\IFabrikator\Bundle\CoreBundle\Entity\SiteAlias $siteAliases)
    {
        $this->siteAliases->removeElement($siteAliases);
    }

    /**
     * Get siteAliases
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getSiteAliases()
    {
        return $this->siteAliases;
    }

    /**
     * Add pages
     *
     * @param \IFabrikator\Bundle\CoreBundle\Entity\Page $pages
     * @return Site
     */
    public function addPage(\IFabrikator\Bundle\CoreBundle\Entity\Page $pages)
    {
        $this->pages[] = $pages;
    
        return $this;
    }

    /**
     * Remove pages
     *
     * @param \IFabrikator\Bundle\CoreBundle\Entity\Page $pages
     */
    public function removePage(\IFabrikator\Bundle\CoreBundle\Entity\Page $pages)
    {
        $this->pages->removeElement($pages);
    }

    /**
     * Get pages
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getPages()
    {
        return $this->pages;
    }
}