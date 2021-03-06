<?php

namespace Faktura\Entity;

use Generic\Object\Object;

class Item extends Object implements ItemInterface
{
    /**
     * @var string
     */
    protected $index;
    
    /**
     * @var string
     */
    protected $description;
    
    /**
     * @var integer
     */
    protected $quantity;
    
    /**
     * @var string
     */
    protected $unitName;
    
    /**
     * @var double
     */
    protected $unitNetPrice;
    
    /**
     * @var double
     */
    protected $taxPercentage;
    
    public function setIndex($index)
    {
        $this->index = (string) $index;
        return $this;
    }
    
    public function getIndex()
    {
        return $this->index;
    }
    
    public function setDescription($description)
    {
        $this->description = (string) $description;
        return $this;
    }
    
    public function getDescription()
    {
        return $this->description;
    }
    
    public function setQuantity($quantity)
    {
        $this->quantity = (int) $quantity;
        return $this;
    }
    
    public function getQuantity()
    {
        return $this->quantity;
    }
    
    public function setUnitName($unitName)
    {
        $this->unitName = (string) $unitName;
        return $this;
    }
    
    public function getUnitName()
    {
        return $this->unitName;
    }
    
    public function setUnitNetPrice($unitNetPrice)
    {
        $this->unitNetPrice = (double) $unitNetPrice;
        return $this;
    }
    
    public function getUnitNetPrice()
    {
        return $this->unitNetPrice;
    }
    
    public function setTaxPercentage($taxPercentage)
    {
        $this->taxPercentage = (double) $taxPercentage;
        return $this;
    }
    
    public function getTaxPercentage()
    {
        return $this->taxPercentage;
    }
    
    public function getTotalNetAmount()
    {
        return $this->getUnitNetPrice() * $this->getQuantity();
    }
    
    public function getTotalTaxAmount()
    {
        return $this->getTotalNetAmount() * $this->getTaxPercentage();
    }
    
    public function getTotalAmount()
    {
        return $this->getTotalNetAmount() + $this->getTotalTaxAmount();
    }
    
    public function toArray()
    {
        return array_merge(parent::toArray(), array(
            'totalNetAmount' => $this->getTotalNetAmount(),
            'totalTaxAmount' => $this->getTotalTaxAmount(),
            'totalAmount' => $this->getTotalAmount()
        ));
    }
}
