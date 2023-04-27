<!DOCTYPE html>
<html lang="sv">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Klasser</title>
</head>

<body>
    <h1>Player class</h1>
    <?php

    class Player
    {
        private string $name;
        private int $strenght_level;

        public function __construct($name, $strenght_level)
        {
            $this->name = $name;
            $this->strenght_level = $strenght_level;
        }

        public function punch()
        {
            echo "POW! $this->name is punching with $this->strenght_level power level!";
        }
    }

    $my_player = new Player("Bob", 10000);

    $my_player->punch();

    ?>
</body>

</html>