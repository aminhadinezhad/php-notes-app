<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Associative Arrays</title>
</head>

<body>
    <h1>Recommended Books</h1>

    <?php
    $books = [
        [
            'name' => "Do Androids Dream of Electric Sheep?",
            'author' => "Philip K. Dick",
            'purchaseUrl' => "http://example.com"
        ],
        [
            'name' => "The Langoliers",
            'author' => "Stephen King",
            'purchaseUrl' => "http://example.com"
        ],
        [
            'name' => "Hail Mary",
            'author' => "Andy Weir",
            'purchaseUrl' => "http://example.com"
        ]
    ];
    ?>

    <ul>
        <?php foreach ($books as $book) : ?>
            <li>
                <?php echo "name: $book[name] <br> author: $book[author] <br> purchase url: <a href='$book[purchaseUrl]'>click here</a> <br><br>" ?>
            </li>
        <?php endforeach ?>
    </ul>
</body>
 
</html>