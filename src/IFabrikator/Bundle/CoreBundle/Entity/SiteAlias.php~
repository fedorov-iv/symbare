<?php

namespace IFabrikator\Bundle\CoreBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use IFabrikator\Bundle\CoreBundle\Entity\Site;


/**
 * SiteAlias
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="IFabrikator\Bundle\CoreBundle\Entity\SiteAliasRepository")
 */
class SiteAlias
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
     * @ORM\Column(name="host", type="string", length=255)
     */
    private $host;


    /**
     * @ORM\ManyToOne(targetEntity="Site", inversedBy="siteAliases")
     * @ORM\JoinColumn(name="site_id", referencedColumnName="id")
     */
    private $site;


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
     * Set host
     *
     * @param string $host
     * @return SiteAlias
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
     * Set site
     *
     * @param Site $site
     * @return SiteAlias
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


}