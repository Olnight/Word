<?php
class ShopProduct
{
    public function __construct(public string $title, public string $producerFirstName = "", public string $producerMainName = "", public float $price = 0)
    {
    }

    public function getProducer()
    {
        return "$this->producerFirstName $this->producerMainName";
    }

    public function setProducer(string $firstName, string $mainName)
    {
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
    }
}

class CDProduct extends ShopProduct
{
    public function __construct(string $title, string $firstName = "", string $mainName = "", float $price = 0, public float $playLength = 0)
    {
        parent::__construct($title, $firstName, $mainName, $price);
    }
}

class BookProduct extends ShopProduct
{
    public function __construct(string $title, string $firstName = "", string $mainName = "", float $price = 0, public int $numPages = 0)
    {
        parent::__construct($title, $firstName, $mainName, $price);
    }
}

class ProductInfoPrinter
{
    public function printProductInfo(ShopProduct $product)
    {
        echo "Product Info:\n";
        echo "Title: {$product->title}\n";
        echo "Producer: {$product->getProducer()}\n";
        echo "Price: {$product->price}\n";
    }
}

// Пример использования классов
$cd = new CDProduct("Album Title", "First Name", "Main Name", 12.99, 60);
$book = new BookProduct("Book Title", "First Name", "Main Name", 9.99, 200);

$printer = new ProductInfoPrinter();
$printer->printProductInfo($cd);
$printer->printProductInfo($book);