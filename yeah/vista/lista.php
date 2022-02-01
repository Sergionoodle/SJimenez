<head>
    <meta charset="UTF-8">
    <title>World Game</title>
    <style>
        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 5px;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<h1>Countries</h1>
<br>
<h2>My countries</h2>
<table>
    <tbody><tr>
        <th>Code</th>
        <th>Name</th>
        <th>Population</th>
        <th>GNP</th>
        <th>NumLanguages</th>
        <th>NumCities</th>
        <th>Owner</th>
    </tr>
    <?php foreach ($usuarios as $usr){ ?>
        <tr>
            <td><?php echo $usr->getCode() ?></td>
            <td><?php echo $usr->getName() ?></td>
            <td><?php echo $usr->getPopulation()?></td>
            <td><?php echo $usr->getGNP();?></td>
            <td><?php echo count($usr->getNumLang())?></td>
            <td><?php echo count($usr->getNumCities())?></td>
            <td><?php echo $usr->getUsers()->getMail()?></td>
        </tr>
    <?php
        $fuerzaUser = $usr->getGNP() + $usr->getPopulation();

    }

    ?>
    </tbody></table>
<br>
<h2>Other countries</h2>
<table>
    <tbody><tr>
        <th>Code</th>
        <th>Name</th>
        <th>Population</th>
        <th>GNP</th>
        <th>NumLanguages</th>
        <th>NumCities</th>
        <th>Owner</th>
        <th>Action</th>
    </tr>
    <?php  foreach ($datos as $dato){ ?>
        <tr>
            <td><?php echo $dato->getCode();  ?></td>
            <td><?php echo $dato->getName(); ?></td>
            <td><?php echo $dato->getPopulation(); ?></td>
            <td><?php echo $dato->getGNP(); ?></td>
            <td><?php echo count($dato->getNumLang()) ?></td>
            <td><?php echo count($dato->getNumCities()) ?></td>
            <td><?php echo $dato->getUsers()->getMail(); ?></td>
            <?php  if($_SESSION['u_id'] != $dato->getUsers()->getId()){
                $fuerzaC = $dato->getPopulation() + $dato->getGNP();
                echo "<td><a href='../controler/control_atac.php?id=".$dato->getCode()."&fc=".$fuerzaC."&fu=".$fuerzaUser."'>Attack</a></td>";

            }else{
                echo "<td>Owned</td>";
            }?>
        </tr>
    <?php  } ?>
    </tbody></table>
<span><a href="../controler/logout.php">Logout</a></span>


</body>


