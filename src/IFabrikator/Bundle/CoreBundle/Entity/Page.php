<?php

namespace IFabrikator\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use \Doctrine\Common\Collections\ArrayCollection;

/**
 * Page
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IFabrikator\Bundle\CoreBundle\Entity\PageRepository")
 */
class Page
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
     * @ORM\Column(name="language", type="string", length=16)
     */
    private $language;

    /**
     * @var string
     *
     * @ORM\Column(name="slug", type="string", length=255)
     */
    private $slug;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_logon_required", type="boolean")
     */
    private $isLogonRequired;

    /**
     * @var string
     *
     * @ORM\Column(name="url", type="string", length=1024)
     */
    private $url;

    /**
     * @var string
     *
     * @ORM\Column(name="redirect", type="string", length=1024)
     */
    private $redirect = '';

    /**
     * @var string
     *
     * @ORM\Column(name="meta_description", type="text")
     */
    private $metaDescription = '';

    /**
     * @var string
     *
     * @ORM\Column(name="meta_keywords", type="text")
     */
    private $metaKeywords = '';

    /**
     * @var string
     *
     * @ORM\Column(name="template", type="string", length=255)
     */
    private $template = '';

    /**
     * @ORM\OneToMany(targetEntity="Page", mappedBy="parent", cascade={"persist", "remove"})
     */
    private $children;

    /**
     * @ORM\ManyToOne(targetEntity="Page", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
    private $parent = null;


    /**
     * @ORM\ManyToOne(targetEntity="Site", inversedBy="pages")
     * @ORM\JoinColumn(name="site_id", referencedColumnName="id")
     */
    private $site;

    /**
     * @ORM\ManyToMany(targetEntity="Control", mappedBy="pages")
     */
    private $controls;


    public function __construct() {
        $this->children = new ArrayCollection();
        $this->controls = new \Doctrine\Common\Collections\ArrayCollection();

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
     * @return Page
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
     * Set language
     *
     * @param string $language
     * @return Page
     */
    public function setLanguage($language)
    {
        $this->language = $language;
    
        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }

    /**
     * Set slug
     *
     * @param string $slug
     * @return Page
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    
        return $this;
    }

    /**
     * Get slug
     *
     * @return string 
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Page
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
     * Set isLogonRequired
     *
     * @param boolean $isLogonRequired
     * @return Page
     */
    public function setIsLogonRequired($isLogonRequired)
    {
        $this->isLogonRequired = $isLogonRequired;
    
        return $this;
    }

    /**
     * Get isLogonRequired
     *
     * @return boolean 
     */
    public function getIsLogonRequired()
    {
        return $this->isLogonRequired;
    }

    /**
     * Set url
     *
     * @param string $url
     * @return Page
     */
    public function setUrl($url)
    {
        $this->url = $url;
    
        return $this;
    }

    /**
     * Get url
     *
     * @return string 
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * Set metaDescription
     *
     * @param string $metaDescription
     * @return Page
     */
    public function setMetaDescription($metaDescription)
    {
        $this->metaDescription = $metaDescription;
    
        return $this;
    }

    /**
     * Get metaDescription
     *
     * @return string 
     */
    public function getMetaDescription()
    {
        return $this->metaDescription;
    }

    /**
     * Set metaKeywords
     *
     * @param string $metaKeywords
     * @return Page
     */
    public function setMetaKeywords($metaKeywords)
    {
        $this->metaKeywords = $metaKeywords;
    
        return $this;
    }

    /**
     * Get metaKeywords
     *
     * @return string 
     */
    public function getMetaKeywords()
    {
        return $this->metaKeywords;
    }

    /**
     * Set template
     *
     * @param string $template
     * @return Page
     */
    public function setTemplate($template)
    {
        $this->template = $template;
    
        return $this;
    }

    /**
     * Get template
     *
     * @return string 
     */
    public function getTemplate()
    {
        return $this->template;
    }



    /**
     * Set parent
     *
     * @param Page $page
     * @return Page
     */
    public function setParent(Page $page){

        $this->parent = $page;

        return $this;

    }

    /**
     * Get parent
     *
     * @return Page $page
     */
    public function getParent()
    {
        return $this->parent;
    }





    /**
     * Set site
     *
     * @param Site $site
     * @return Page
     */
    public function setSite(Site $site){

        $this->site = $site;

        return $this;

    }

    /**
     * Get site
     *
     * @return Site $site
     */
    public function getSite()
    {
        return $this->site;
    }

    /**
     * Set redirect
     *
     * @param string $redirect
     * @return Page
     */
    public function setRedirect($redirect)
    {
        $this->redirect = $redirect;
    
        return $this;
    }

    /**
     * Get redirect
     *
     * @return string 
     */
    public function getRedirect()
    {
        return $this->redirect;
    }

    /**
     * Add children
     *
     * @param \IFabrikator\Bundle\CoreBundle\Entity\Page $children
     * @return Page
     */
    public function addChildren(\IFabrikator\Bundle\CoreBundle\Entity\Page $children)
    {
        $this->children[] = $children;
    
        return $this;
    }

    /**
     * Remove children
     *
     * @param \IFabrikator\Bundle\CoreBundle\Entity\Page $children
     */
    public function removeChildren(\IFabrikator\Bundle\CoreBundle\Entity\Page $children)
    {
        $this->children->removeElement($children);
    }

    /**
     * Get children
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * Add controls
     *
     * @param \IFabrikator\Bundle\CoreBundle\Entity\Control $controls
     * @return Page
     */
    public function addControl(\IFabrikator\Bundle\CoreBundle\Entity\Control $controls)
    {
        $this->controls[] = $controls;
    
        return $this;
    }

    /**
     * Remove controls
     *
     * @param \IFabrikator\Bundle\CoreBundle\Entity\Control $controls
     */
    public function removeControl(\IFabrikator\Bundle\CoreBundle\Entity\Control $controls)
    {
        $this->controls->removeElement($controls);
    }

    /**
     * Get controls
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getControls()
    {
        return $this->controls;
    }
}