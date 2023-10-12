class ShopProduct
{
    // ... (существующий код класса)

    public function actionCreate(PDO $pdo): bool
    {
        try {
            $sql = "INSERT INTO products (title, producerFirstName, producerMainName, price) VALUES (?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->title, $this->producerFirstName, $this->producerMainName, $this->price]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

class CDProduct extends ShopProduct
{
    // ... (существующий код класса)

    public function actionCreate(PDO $pdo): bool
    {
        try {
            $sql = "INSERT INTO products (title, producerFirstName, producerMainName, price, playLength) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->title, $this->producerFirstName, $this->producerMainName, $this->price, $this->playLength]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}

class BookProduct extends ShopProduct
{
    // ... (существующий код класса)

    public function actionCreate(PDO $pdo): bool
    {
        try {
            $sql = "INSERT INTO products (title, producerFirstName, producerMainName, price, numPages) VALUES (?, ?, ?, ?, ?)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$this->title, $this->producerFirstName, $this->producerMainName, $this->price, $this->numPages]);
            return true;
        } catch (PDOException $e) {
            return false;
        }
    }
}
