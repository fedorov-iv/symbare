<?php

namespace IFabrikator\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Control
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IFabrikator\Bundle\CoreBundle\Entity\ControlRepository")
 */
class Control
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
     * @ORM\Column(name="code", type="string", length=255)
     */
    private $code;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text")
     */
    private $description = '';

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_active", type="boolean")
     */
    private $isActive;

    /**
     * @var string
     *
     * @ORM\Column(name="class_name", type="string", length=255)
     */
    private $className;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_admin", type="boolean")
     */
    private $isAdmin;

    /**
     * @var boolean
     *
     * @ORM\Column(name="is_common", type="boolean")
     */
    private $isCommon;


    /**
     * @ORM\ManyToMany(targetEntity="Page", inversedBy="controls")
     * @ORM\JoinTable(name="PageControl")
     */
    private $pages;

    public function __construct() {
        $this->pages = new \Doctrine\Common\Collections\ArrayCollection();
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
     * @return Control
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
     * Set description
     *
     * @param string $description
     * @return Control
     */
    public function setDescription($description)
    {
        $this->description = $description;
    
        return $this;
    }

    /**
     * Get description
     *
     * @return string 
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set isActive
     *
     * @param boolean $isActive
     * @return Control
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
     * Set className
     *
     * @param string $className
     * @return Control
     */
    public function setClassName($className)
    {
        $this->className = $className;
    
        return $this;
    }

    /**
     * Get className
     *
     * @return string 
     */
    public function getClassName()
    {
        return $this->className;
    }

    /**
     * Set isAdmin
     *
     * @param boolean $isAdmin
     * @return Control
     */
    public function setIsAdmin($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    
        return $this;
    }

    /**
     * Get isAdmin
     *
     * @return boolean 
     */
    public function getIsAdmin()
    {
        return $this->isAdmin;
    }

    /**
     * Set isCommon
     *
     * @param boolean $isCommon
     * @return Control
     */
    public function setIsCommon($isCommon)
    {
        $this->isCommon = $isCommon;
    
        return $this;
    }

    /**
     * Get isCommon
     *
     * @return boolean 
     */
    public function getIsCommon()
    {
        return $this->isCommon;
    }

    /**
     * Add pages
     *
     * @param \IFabrikator\Bundle\CoreBundle\Entity\Page $pages
     * @return Control
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

    /**
     * Set code
     *
     * @param string $code
     * @return Control
     */
    public function setCode($code)
    {
        $this->code = $code;
    
        return $this;
    }

    /**
     * Get code
     *
     * @return string 
     */
    public function getCode()
    {
        return $this->code;
    }
}