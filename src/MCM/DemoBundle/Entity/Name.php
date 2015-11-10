<?php 
namespace MCM\DemoBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;


class Name
{
    protected $first_name;

    protected $second_name;

    public function getFirstname()
    {

        return $this->first_name ;
    }

    public function getSecondname()
    {

        return $this->second_name ;
    }

    public function __toString()
    {
    	return $this->first_name;
    }
}