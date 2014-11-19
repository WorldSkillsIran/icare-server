<?php

namespace Worldskills\CareBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Tip
 *
 * @ORM\Table()
 * @ORM\Entity
 */
class Tip
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
     * @var \DateTime
     *
     * @ORM\Column(name="datetime", type="datetime")
     */
    private $datetime;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Worldskills\CareBundle\Entity\Subject")
     */
    private $subject;

    /**
     * @var
     *
     * @ORM\ManyToOne(targetEntity="Worldskills\UserBundle\Entity\User")
     */
    private $user;


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
     * @return Tip
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
     * Set datetime
     *
     * @param \DateTime $datetime
     * @return Tip
     */
    public function setDatetime($datetime)
    {
        $this->datetime = $datetime;

        return $this;
    }

    /**
     * Get datetime
     *
     * @return \DateTime 
     */
    public function getDatetime()
    {
        return $this->datetime;
    }

    /**
     * Set subject
     *
     * @param \Worldskills\CareBundle\Entity\Subject $subject
     * @return Tip
     */
    public function setSubject(\Worldskills\CareBundle\Entity\Subject $subject = null)
    {
        $this->subject = $subject;

        return $this;
    }

    /**
     * Get subject
     *
     * @return \Worldskills\CareBundle\Entity\Subject 
     */
    public function getSubject()
    {
        return $this->subject;
    }

    /**
     * Set user
     *
     * @param \Worldskills\UserBundle\Entity\User $user
     * @return Tip
     */
    public function setUser(\Worldskills\UserBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \Worldskills\UserBundle\Entity\User 
     */
    public function getUser()
    {
        return $this->user;
    }
}
