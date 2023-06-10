<?php
    $message = '';
    if (isset($_POST['submit'])) {
        $totalFemaleEmployee = 0;
        $totalMaleEmployee = 0;
        $totalMarriedMen = 0;
        $totalwidowWomen = 0;
        $ageAverageMen = 0;
        for ($i = 1; $i <= 5; $i++) {
            $name[$i] = $_POST["name$i"];
            $age[$i] = $_POST["age$i"];
            $gender[$i] = $_POST["gender$i"];
            $civilStatus[$i] = $_POST["civil-status$i"];
            $salary[$i] = $_POST["salary$i"];
            $submit = false;
        }
        for ($i = 1; $i <= 5; $i++) {
            if ($gender[$i] === 'female') {
                $totalFemaleEmployee++;
                if ($civilStatus[$i] === 'widower' && $salary[$i] > 1000) {
                    $totalwidowWomen++;
                }
            } else if ($gender[$i] === 'male') {
                $totalMaleEmployee++;
                $ageAverageMen += $age[$i];
                if ($civilStatus[$i] === 'married' && $salary[$i] > 2500) {
                    $totalMarriedMen++;
                }
            } else {
                $message = 'Datos incompletos, rellene el formulario correctamente.';
            }
        }
        $ageAverageMen /= $totalMaleEmployee;
    } else {
        $message = 'Datos incompletos, rellene el formulario correctamente.';
    }
    echo 'Total de empleados femeninos: ',$totalFemaleEmployee,'<br>';
    echo 'Total de hombres casados que ganan más de 2500 Bs: ',$totalMarriedMen,'<br>';
    echo 'Total de mujeres viudas que ganan más de 1000 Bs: ',$totalwidowWomen,'<br>';
    echo 'Edad promedio de hombres: ',$ageAverageMen;
?>