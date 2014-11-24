<?php

namespace Worldskills\CareBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Worldskills\UserBundle\Entity\User;
//indexes={@ORM\Index(columns={"title"}, flags={"fulltext"})}
/**
 * Subject
 *
 * @ORM\Table(name="subject")
 * @ORM\Entity(repositoryClass="Worldskills\CareBundle\Entity\SubjectRepository")
 * @ORM\HasLifecycleCallbacks()
 */
class Subject
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
     * @var VoteThread
     *
     * @ORM\OneToOne(targetEntity="VoteThread")
     */
    private $voteThread;

    /**
     * @var Tag
     *
     * @ORM\ManyToMany(targetEntity="Worldskills\CareBundle\Entity\Tag")
     */
    private $tags;

    /**
     * @var User
     *
     * @ORM\ManyToOne(targetEntity="Worldskills\UserBundle\Entity\User")
     */
    private $user;

    /**
     * @var Options[]
     *
     * @ORM\OneToMany(targetEntity="Worldskills\CareBundle\Entity\Options", mappedBy="subject")
     */
    private $options;

    private $score;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tags = new \Doctrine\Common\Collections\ArrayCollection();
        $this->datetime = new \DateTime();
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
     * @return Subject
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
     * @return Subject
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
     * Set voteThread
     *
     * @param \Worldskills\CareBundle\Entity\VoteThread $voteThread
     * @return Subject
     */
    public function setVoteThread(\Worldskills\CareBundle\Entity\VoteThread $voteThread = null)
    {
        $this->voteThread = $voteThread;

        return $this;
    }

    /**
     * Get voteThread
     *
     * @return \Worldskills\CareBundle\Entity\VoteThread
     */
    public function getVoteThread()
    {
        return $this->voteThread;
    }

    /**
     * Add tags
     *
     * @param \Worldskills\CareBundle\Entity\Tag $tags
     * @return Subject
     */
    public function addTag(\Worldskills\CareBundle\Entity\Tag $tags)
    {
        $this->tags[] = $tags;

        return $this;
    }

    /**
     * Remove tags
     *
     * @param \Worldskills\CareBundle\Entity\Tag $tags
     */
    public function removeTag(\Worldskills\CareBundle\Entity\Tag $tags)
    {
        $this->tags->removeElement($tags);
    }

    /**
     * Get tags
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * Set user
     *
     * @param \Worldskills\UserBundle\Entity\User $user
     * @return Subject
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

    /**
     * @ORM\PrePersist()
     */
    public function addVoteThread() {
        $this->voteThread = new VoteThread();
    }

    /**
     * Get The score of this subject in a collection
     *
     * @return mixed
     */
    public function getScore() {
        return $this->score;
    }
}
