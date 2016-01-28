<<<<<<< HEAD
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // Incluimos la clase que implementa el funcionalidad de una colección de objetos
        require_once 'collection.php';

        // Clase de ejemplo para crear objetos en la colección. Solamente tiene una propiedad id

        class Example {

            private $id;

            public function setId($id) {
                $this->id = $id;
            }

            public function getId() {
                return $this->id;
            }

        }

        // Creamos un objeto de la clase colección
        $collection = new Collection;

        // Populamos la colección con 10 objetos ejemplo
        for ($i = 1; $i <= 10; $i++) {
            $example = new Example;
            $example->setId($i);
            // add the object to the collection
            $collection->add($example);
        }
        echo "-------------------------------------------------------------";
        var_dump($collection);
        echo "-------------------------------------------------------------<br>";

        // Obtenemos el primer objeto de la colección
        echo "-------------------------------------------------------------";
        $first = $collection->getCurrent();
        var_dump($first);
        echo "-------------------------------------------------------------<br>";

        //Avanzar el cursos y obtener el segundo elemento
        echo "-------------------------------------------------------------";
        $collection->next();
        $second = $collection->getCurrent();
        var_dump($second);
        echo "-------------------------------------------------------------<br>";

        //Encontrar el objeto cuyo id es 5
        echo "-------------------------------------------------------------";
        if ($example5 = $collection->findByProperty('id', 5)) {
            var_dump($example5);
        }
        echo "-------------------------------------------------------------<br>";

        //Eliminar el objeto cuyo id es 2
        echo "-------------------------------------------------------------";
        $collection->removeByProperty('id', 2);
        var_dump($collection);
        echo "-------------------------------------------------------------<br>";

        //Mostrar el nÃºmero de objetos
        echo "-------------------------------------------------------------<br>";
        if ($collection->isEmpty()) {
            echo 'sorry, no objects<br>';
        } else {
            echo $collection->getNumObjects() . ' objects!!!!!<br>';
        }
        echo "-------------------------------------------------------------<br>";

        //Iterar por la colección de objetos
        echo "-------------------------------------------------------------<br>";
        $collection->resetIterator();

        while ($example = $collection->iterate()) {
            echo "Objeto: ", $example->getId(), '<br>';
        }
        ?>
    </body>
</html>
=======
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // Incluimos la clase que implementa el funcionalidad de una colección de objetos
        require_once 'collection.php';

        // Clase de ejemplo para crear objetos en la colección. Solamente tiene una propiedad id

        class Example {

            private $id;

            public function setId($id) {
                $this->id = $id;
            }

            public function getId() {
                return $this->id;
            }

        }

        // Creamos un objeto de la clase colección
        $collection = new Collection;

        // Populamos la colección con 10 objetos ejemplo
        for ($i = 1; $i <= 10; $i++) {
            $example = new Example;
            $example->setId($i);
            // add the object to the collection
            $collection->add($example);
        }
        echo "-------------------------------------------------------------";
        var_dump($collection);
        echo "-------------------------------------------------------------<br>";

        // Obtenemos el primer objeto de la colección
        echo "-------------------------------------------------------------";
        $first = $collection->getCurrent();
        var_dump($first);
        echo "-------------------------------------------------------------<br>";

        //Avanzar el cursos y obtener el segundo elemento
        echo "-------------------------------------------------------------";
        $collection->next();
        $second = $collection->getCurrent();
        var_dump($second);
        echo "-------------------------------------------------------------<br>";

        //Encontrar el objeto cuyo id es 5
        echo "-------------------------------------------------------------";
        if ($example5 = $collection->findByProperty('id', 5)) {
            var_dump($example5);
        }
        echo "-------------------------------------------------------------<br>";

        //Eliminar el objeto cuyo id es 2
        echo "-------------------------------------------------------------";
        $collection->removeByProperty('id', 2);
        var_dump($collection);
        echo "-------------------------------------------------------------<br>";

        //Mostrar el nÃºmero de objetos
        echo "-------------------------------------------------------------<br>";
        if ($collection->isEmpty()) {
            echo 'sorry, no objects<br>';
        } else {
            echo $collection->getNumObjects() . ' objects!!!!!<br>';
        }
        echo "-------------------------------------------------------------<br>";

        //Iterar por la colección de objetos
        echo "-------------------------------------------------------------<br>";
        $collection->resetIterator();

        while ($example = $collection->iterate()) {
            echo "Objeto: ", $example->getId(), '<br>';
        }
        ?>
    </body>
</html>
>>>>>>> d08ca635e88c9439c125812d69e09c071049c5c2
