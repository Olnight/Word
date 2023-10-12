<?php
class ShopProduct
{
    public function __construct(public string $title, public string $producerFirstName = "", public string $producerMainName = "", public float $price = 0)
    {
    }

    public function getProducer(): string
    {
        return "$this->producerFirstName $this->producerMainName";
    }

    public function setProducer(string $firstName, string $mainName): void
    {
        $this->producerFirstName = $firstName;
        $this->producerMainName = $mainName;
    }

    public function getTitle(): string
    {
        return "$this->title";
    }

    public function setTitle(string $title): void
    {
        $this->$title = $$title;
    }
    public function getPrice(): float
    {
        return $this->price;
    }

    public function setPrice(string $price): void
    {
        $this->$price = $price;
    }

}

class CDProduct extends ShopProduct
{
    public function __construct(string $title, string $firstName = "", string $mainName = "", float $price = 0, public float $playLength = 0)
    {
        parent::__construct($title, $firstName, $mainName, $price);
    }
    public function getPlayLength(): float
    {
        return $this->playLength;
    }

    public function setPlayLength(string $playLength): void
    {
        $this->$playLength = $playLength;
    }
}

class BookProduct extends ShopProduct
{
    public function __construct(string $title, string $firstName = "", string $mainName = "", float $price = 0, public int $numPages = 0)
    {
        parent::__construct($title, $firstName, $mainName, $price);
    }
    public function getNumPages(): int
    {
        return $this->numPages;
    }

    public function setNumPages(string $numPages): void
    {
        $this->$numPages = $numPages;
    }
}

class ShowInfo
{
    public function printCD(CDProduct $ShopProduct):void{
        $str = "{$ShopProduct -> getTitle()}, {$ShopProduct -> getProducer()}, {$ShopProduct -> getPrice()}, {$ShopProduct -> getPlayLength()}"; 
        print $str;
    }
    public function printBook(BookProduct $ShopProduct):void{
        $str = "{$ShopProduct -> getTitle()}, {$ShopProduct -> getProducer()}, {$ShopProduct -> getPrice()}, {$ShopProduct -> getNumPages()}"; 
        print $str;
    }    
    
}

// Пример использования классов
$cd = new CDProduct("Музыкальный альбом", "Майкл", "Джексон", 12.99, 60);
$book = new BookProduct("Книга", "Рой", "Бербери", 9.99, 200);

$printer = new ShowInfo();
$printer->printCD($cd);
print '<br>';
$printer->printBook($book);