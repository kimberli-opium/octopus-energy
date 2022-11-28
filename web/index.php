<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
</head>
<body>
<p>hi!</p>
<?php
require __DIR__ . '/../vendor/autoload.php';

use OctopusEnergy\TechChallenge\Factory;

$factory = new Factory();

$exportService = $factory->createExportService();
$fileHeader = $exportService->exportFileHeader();
?>

<table>
    <tr>
        <th>File Identifier</th>
        <th>Contact</th>
        <th>Country</th>
    </tr>
    <tr>
        <td><?php echo $fileHeader[0]['file_id']; ?></td>
        <td>Maria Anders</td>
        <td>Germany</td>
    </tr>
    <tr>
        <td>Centro comercial Moctezuma</td>
        <td>Francisco Chang</td>
        <td>Mexico</td>
    </tr>
</table>

</body>
</html>

