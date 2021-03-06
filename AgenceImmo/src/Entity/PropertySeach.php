<?php
namespace App\Entity;
use Doctrine\Common\Collections\ArrayCollection;
use Symfony\Component\Validator\Constraints as Assert;
class PropertySeach{

    /**
     * @var int|null
     */
    private  $maxprice;
    /**
     * @var int|null
     * @Assert\Range(min="10",max="400")
     */
    private  $minSurface;
    /*
     * @var ArrayCollection
     */
    private $options;

    /**
     * @return ArrayCollection
     */
    public function getOptions(): ArrayCollection
    {
        return $this->options;
    }

    /**
     * @param ArrayCollection $options
     */
    public function setOptions(ArrayCollection $options): void
    {
        $this->options = $options;
    }

    public function __construct()
    {
        $this->options = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getMaxprice(): ?int
    {
        return $this->maxprice;
    }

    /**
     * @param int|null $maxprice
     * @return PropertySeach
     */
    public function setMaxprice(int $maxprice): PropertySeach
    {
        $this->maxprice = $maxprice;
        return $this;
    }

    /**
     * @return int|null
     */
    public function getMinSurface(): ?int
    {
        return $this->minSurface;
    }

    /**
     * @param int|null $minSurface
     * @return PropertySeach
     */
    public function setMinSurface(int $minSurface): PropertySeach
    {
        $this->minSurface = $minSurface;
        return $this;
    }



}