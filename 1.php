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
$dsn = "mysql:host=localhost;dbname=имя_базы;charset=UTF8";
$pdo = new PDO($dsn, 'логин', 'пароль');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$cd = new CDProduct("Музыкальный альбом", "Майкл", "Джексон", 12.99, 60);
$book = new BookProduct("Книга", "Рой", "Бербери", 9.99, 200);

if ($cd->actionCreate($pdo)) {
    echo "Запись CD успешно добавлена в базу данных.";
}

if ($book->actionCreate($pdo)) {
    echo "Запись Book успешно добавлена в базу данных.";
}

$dsn = "mysql:host=localhost;dbname=имя_базы;charset=UTF8";
$pdo = new PDO($dsn, 'логин', 'пароль');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// Замените "имя_таблицы" и названия столбцов на свои собственные
$tableName = "products";
$sql = "CREATE TABLE IF NOT EXISTS $tableName (
    id INT AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    producerFirstName VARCHAR(255),
    producerMainName VARCHAR(255),
    price DECIMAL(10, 2) NOT NULL,
    playLength FLOAT,
    numPages INT
)";

try {
    $pdo->exec($sql);
    echo "Таблица '$tableName' успешно создана.";
} catch (PDOException $e) {
    echo "Ошибка при создании таблицы: " . $e->getMessage();
}

