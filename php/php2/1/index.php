<?php
class PriceTag{
    private $manufacturerPrice;
    protected $priceIncrement;
    protected $currentPrice;
    protected $priceInfo;
    protected $priceSetDate;


    public function __construct($manufacturerPrice,$priceIncrement,$priceInfo,$priceSetDate)
    {
        $this->manufacturerPrice = $manufacturerPrice;
        $this->priceIncrement = $priceIncrement;
        $this->currentPrice = $manufacturerPrice*$priceIncrement;
        $this->priceInfo = $priceInfo;
        $this->priceSetDate = $priceSetDate;
    }

    public function getPrice()
    {
        return $this->currentPrice;
    }

    public function setPrice($price)
    {
        if($price>$this->manufacturerPrice){
            $this->currentPrice = $price;
            $result = 'Цена успешно обновлена';
        }else{
            $result = 'Мы не торгуем себе в убыток';
        }
        return $result;
    }

    protected function generatePriceContent()
    {
        $content = <<<php
        <p>Price: {$this->currentPrice}</p>  
        <p>Info: {$this->priceInfo}</p>  
        <p>Date: {$this->priceSetDate}</p>
php;
        return $content;
    }

    public function display()
    {
        echo $this->generatePriceContent();
    }
}

class OptPriceTag extends PriceTag {
    protected $pcsInPack;

    public function __construct($manufacturerPrice,$priceIncrement,$priceInfo,$priceSetDate, $pcsInPack)
    {
        parent::__construct($manufacturerPrice,$priceIncrement,$priceInfo,$priceSetDate);
        $this->pcsInPack = $pcsInPack;
    }

    protected function generatePriceContent()
    {
        $content = parent::generatePriceContent();
        $content.= "<p>Pieces in Pack: {$this->pcsInPack}</p>";
        return $content;
    }
}


$phonePrice = new PriceTag(8965,1.3,'Почтавщик Ситилинк. Розница','08.09.2019');
$phonePrice->display();

$phonePackPrice = new OptPriceTag(8965,1.15,'Почтавщик Ситилинк. Опт','08.09.2019',20);
$phonePackPrice->display();

