<?php
$controls = setSquare();
$geometricShape = "square";
$geometricShapeName;
$geometricShapeImage;
$area;

if (isset($_GET["calculate-area"])) {
    $geometricShape = $_GET["geometric-shape"];

    switch ($geometricShape) {
        case "square":
            calculateSquareArea();
            $controls = setSquare();
            break;
        case "triangle":
            calculateTriangleArea();
            $controls = setTriangle();
            break;
        case "rectangle":
            calculateRectangleArea();
            $controls = setRectangle();
            break;
        case "circle":
            calculateCircleArea();
            $controls = setCircle();
            break;
        case "trapezoid":
            calculateTrapezoidArea();
            $controls = setTrapezoid();
            break;
        case "rhombus":
            calculateRhombusArea();
            $controls = setRhombus();
            break;
    }
}

if (isset($_GET["change-geometric-shape"])) {
    $geometricShape = $_GET["geometric-shape"];
    switch ($geometricShape) {
        case "square":
            $controls = setSquare();
            break;
        case "rectangle":
            $controls = setRectangle();
            break;
        case "triangle":
            $controls = setTriangle();
            break;
        case "circle":
            $controls = setCircle();
            break;
        case "trapezoid":
            $controls = setTrapezoid();
            break;
        case "rhombus":
            $controls = setRhombus();
            break;
    }
}

function setSquare()
{
    global $geometricShapeName;
    global $geometricShapeImage;
    $geometricShapeName = "Quadrado";
    $geometricShapeImage = '<img src="src/assets/square.svg" class="geometric-shape" alt="">';
    return '
    <label class="control" for="side">
        <span>Lado (cm):</span>
        <input type="text" name="side" id="side" placeholder="ex. 5.0">
    </label>
    ';
}

function setTriangle()
{
    global $geometricShapeName;
    global $geometricShapeImage;
    $geometricShapeName = "Triângulo";
    $geometricShapeImage = '<img src="src/assets/triangle.svg" class="geometric-shape" alt="">';
    return '
    <label class="control" for="base">
        <span>Base (cm):</span>
        <input type="text" name="base" id="base" placeholder="ex. 5.0">
    </label>
    <label class="control" for="height">
        <span>Altura (cm):</span>
        <input type="text" name="height" id="height" placeholder="ex. 2.5">
    </label>
    ';
}

function setRectangle()
{
    global $geometricShapeName;
    global $geometricShapeImage;
    $geometricShapeName = "Retângulo";
    $geometricShapeImage = '<img src="src/assets/rectangle.svg" class="geometric-shape" alt="">';
    return '
    <label class="control" for="base">
        <span>Base (cm):</span>
        <input type="text" name="base" id="base" placeholder="ex. 5.0">
    </label>
    <label class="control" for="height">
        <span>Altura (cm):</span>
        <input type="text" name="height" id="height" placeholder="ex. 2.5">
    </label>
    ';
}

function setCircle()
{
    global $geometricShapeName;
    global $geometricShapeImage;
    $geometricShapeName = "Círculo";
    $geometricShapeImage = '<img src="src/assets/circle.svg" class="geometric-shape" alt="">';
    return '
    <label class="control" for="radius">
        <span>Raio (cm):</span>
        <input type="text" name="radius" id="radius" placeholder="ex. 5.0">
    </label>
    ';
}

function setTrapezoid()
{
    global $geometricShapeName;
    global $geometricShapeImage;
    $geometricShapeName = "Trapézio";
    $geometricShapeImage = '<img src="src/assets/trapezoid.svg" class="geometric-shape" alt="">';
    return '
    <label class="control" for="base">
        <span>Base Maior (cm):</span>
        <input type="text" name="base-1" id="base-1" placeholder="ex. 5.0">
    </label>
    <label class="control" for="height">
        <span>Base Menor (cm):</span>
        <input type="text" name="base-2" id="base-2" placeholder="ex. 2.5">
    </label>
    <label class="control" for="height">
        <span>Altura (cm²):</span>
        <input type="text" name="height" id="height" placeholder="ex. 2.5">
    </label>
    ';
}

function setRhombus()
{
    global $geometricShapeName;
    global $geometricShapeImage;
    $geometricShapeName = "Losango";
    $geometricShapeImage = '<img src="src/assets/rhombus.svg" class="geometric-shape" alt="">';
    return '
    <label class="control" for="base">
        <span>Diagonal maior (cm):</span>
        <input type="text" name="diagonal-1" id="diagonal-1" placeholder="ex. 5.0">
    </label>
    <label class="control" for="height">
        <span>Diagonal menor (cm):</span>
        <input type="text" name="diagonal-2" id="diagonal-2" placeholder="ex. 2.5">
    </label>
    ';
}

function calculateSquareArea()
{
    if (!isValidateValues(array($_GET["side"]))) return;
    global $area;
    $side = (float) $_GET["side"];
    $area = $side ** 2;
}

function calculateRectangleArea()
{
    if (!isValidateValues(array($_GET["base"], $_GET["height"]))) return;
    global $area;
    $base = (float) $_GET["base"];
    $height = (float) $_GET["height"];
    $area = $base * $height;
}

function calculateTriangleArea()
{
    if (!isValidateValues(array($_GET["base"], $_GET["height"]))) return;
    global $area;
    $base = (float) $_GET["base"];
    $height = (float) $_GET["height"];
    $area = $base * $height / 2;
}

function calculateCircleArea()
{
    if (!isValidateValues(array($_GET["radius"]))) return;
    global $area;
    $radius = (float) $_GET["radius"];
    $area = pi() * ($radius ** 2);
}

function calculateTrapezoidArea()
{
    if (!isValidateValues(array($_GET["base-1"], $_GET["base-2"]),  $_GET["height"])) return;
    global $area;
    $base1 = (float) $_GET["base-1"];
    $base2 = (float) $_GET["base-2"];
    $height = (float) $_GET["height"];
    $area = (($base1 + $base2) * $height) / 2;
}

function calculateRhombusArea()
{
    if (!isValidateValues(array($_GET["diagonal-1"], $_GET["diagonal-2"]))) return;
    global $area;
    $diagonal1 = (float) $_GET["diagonal-1"];
    $diagonal2 = (float) $_GET["diagonal-2"];
    $area = $diagonal1 * $diagonal2 / 2;
}

function isValidateValues($values)
{
    foreach ($values as $value) {
        if (!is_numeric($value)) {
            return false;
        }
    }
    return true;
}

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculador de Área</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&family=Roboto&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="src/css/global.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="src/css/container-controls.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="src/css/container-result.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="src/css/modal.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="src/css/mobile.css?v=<?php echo time(); ?>">
    <script defer src="https://kit.fontawesome.com/583fd2bd34.js" crossorigin="anonymous"></script>
    <script defer src="src/js/main.js"></script>
</head>

<body>

    <header>
        <h1>Calculador de Área</h1>
    </header>

    <main class="container-content">
        <form class="container-controls" method="GET">
            <h2>Insira os Valores Abaixo:</h2>
            <div class="controls">
                <?php echo $controls; ?>
            </div>
            <button class="button" name="calculate-area">Calcular</button>
            <input type="text" hidden name="geometric-shape" value="<?php echo $geometricShape ?>">
        </form>

        <div class="container-result">
            <?php
            echo "<h2>$geometricShapeName</h2>";
            echo $geometricShapeImage;
            echo isset($area) ?
                '<div class="result">A área do ' . $geometricShapeName . ' é igual a ' . round($area, 2) . 'cm²</div>'
                :
                ''
            ?>
            <button id="button" class="button">Escolher outra figura geométrica</button>
        </div>
    </main>

    <form class="modal" id="modal">
        <div class="modal-container">
            <header class="modal-header">
                <h2>Selecione uma figura</h2>
                <span class="modal-close" id="modalClose">×</span>
            </header>

            <main class="modal-options">
                <label for="square" class="option">
                    <input type="radio" <?php if ($geometricShape == "square") echo "checked"; ?> name="geometric-shape" class="radio" value="square" id="square" data-shapeName="Quadrado">
                    <label for="square"></label>
                    <p>Quadrado</p>
                    <img src="src/assets/square.svg" class="geometric-shape" alt="">
                </label>
                <label for="triangle" class="option">
                    <input type="radio" <?php if ($geometricShape == "triangle") echo "checked"; ?> name="geometric-shape" class="radio" value="triangle" id="triangle" data-shapeName="Triângulo">
                    <p>Triângulo</p>
                    <img src="src/assets/triangle.svg" class="geometric-shape" alt="">
                </label>
                <label for="circle" class="option">
                    <input type="radio" <?php if ($geometricShape == "circle") echo "checked"; ?> name="geometric-shape" class="radio" value="circle" id="circle" data-shapeName="Círculo">
                    <p>Círculo</p>
                    <img src="src/assets/circle.svg" class="geometric-shape" alt="">
                </label>
                <label for="rectangle" class="option">
                    <input type="radio" <?php if ($geometricShape == "rectangle") echo "checked"; ?> name="geometric-shape" class="radio" value="rectangle" id="rectangle" data-shapeName="Retângulo">

                    <p>Retângulo</p>
                    <img src="src/assets/rectangle.svg" class="geometric-shape" alt="">
                </label>
                <label for="trapezoid" class="option">
                    <input type="radio" <?php if ($geometricShape == "trapezoid") echo "checked"; ?> name="geometric-shape" class="radio" value="trapezoid" id="trapezoid" data-shapeName="Trapézio">
                    <p>Trapézio</p>
                    <img src="src/assets/trapezoid.svg" class="geometric-shape" alt="">
                </label>
                <label for="rhombus" class="option">
                    <input type="radio" <?php if ($geometricShape == "rhombus") echo "checked"; ?> name="geometric-shape" class="radio" value="rhombus" id="rhombus" data-shapeName="Losango">
                    <p>Losango</p>
                    <img src="src/assets/rhombus.svg" class="geometric-shape" alt="">
                </label>
            </main>

            <button class="button" id="modal-button" name="change-geometric-shape">Escolher <span id="geometric-shape-name">Quadrado</span></button>

        </div>
    </form>
</body>
</html>