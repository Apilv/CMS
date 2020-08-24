<?php
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="pages")
 */
class Pages
{
    /** 
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;
    /** 
     * @ORM\Column(type="string") 
     */
    private $pageName;

    /**
     * @ORM\Column(type="text")
     */
    private $content;

    

    public function getId()
    {
        return $this->id;
    }
    
    public function setName($pageName){
        $this->pageName = $pageName;
    }

    public function getName()
    {
        return $this->pageName;
    }


    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }


    public function __construct()
    {
        
    }
}