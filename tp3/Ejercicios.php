
<h4>1:</h4>
<p>
<?php
include('header.php');
$myNumber = 123; 
$numberString = "123";
echo "my number 123:";
echo $myNumber;

echo "//number stringg:";
echo $numberString;

echo "//suma:";
echo $myNumber + $numberString;

echo "//suma primero numbstr:";
echo $numberString + $myNumber;
include('footer.php');
?>
</p>

<h4>2:</h4>
<?php 
echo "a.	1 == ”1”";  
if(1 == "1"){
    echo "es correcto";
}

echo "b.	1 === ”1”";
if(1==="1"){
    echo "es correcto";
}

echo "c.	! null ";
if(!null){
    echo "es correcto";
}

echo "d.	! false ";
if(!false){
    echo "es correcto";
}

echo "e.	“” ";
if(""){
    echo "es correcto";
}

echo "f.	“ “ ";
if(" "){
    echo "es correcto";
}
echo "g.	“tested” ";
if("tested"){
    echo "es correcto";
}

echo "h.	1-1";
if(1-1){
    echo "es correcto";
}
?>

<h4>3: </h4>

<?php 

function multiplicar($num1,$num2){

    return $num1 * $num2;
}

function dividir($num1,$num2){

    if ($num2==0){
        echo "No se puede dividir por 0";
    }
    else{
        return $num1/$num2;
    }
}
 
 echo "multiplicacion 2*5: ". multiplicar(2,5);

 echo "dividir 5/2: ". dividir(5,2);

 echo dividir(5,0);

?>


<h4>4: </h4>

<?php 

$array = [  
    1     => "first value",
    "1"  => "second value",    
    1.2  => "tirth value",    
    true => "fourth value",    
    1+0.2 => "fifth value",    
    false !== null => "sixth value", 
];

echo "el array tiene esta cantidad de elementos: ";
  echo count($array);

?>

<h4>5:</h4>
<?php

$people = array( 
    array('name' => 'Martin', 'age' => 18, 'sex' => 'm'), 
    array('name' => 'Martina', 'age' => 25, 'sex' => 'f'), 
    array('name' => 'Pablo', 'age' => 27, 'sex' => 'm'), 
    array('name' => 'Paula', 'age' => 12, 'sex' => 'f'), 
    array('name' => 'Alexis', 'age' => 8, 'sex' => 'm'), 
    array('name' => 'Jacinta', 'age' => 33, 'sex' => 'f'), 
    array('name' => 'Epifania', 'age' => 45, 'sex' => 'f'), 
);


function mostrarMayores($array){

    for($fil=0;$fil<7;$fil++){
        if($array[$fil]['age']>17){
           echo $array[$fil]['name']. " es mayor porque tiene: ".$array[$fil]['age']." años.","<br>";
        }
    }
    
}

function contarMayores($array){
$cont=0;
    for($fil=0;$fil<7;$fil++){
        if($array[$fil]['age']>17)    
           $cont++ ;        
    }
echo "Cantidad de mayores de edad: ".$cont;
}

function contarMujeresMenores($array){
         $cont=0;
        for($fil=0;$fil<7;$fil++){
            if(($array[$fil]['age']>17) and ($array[$fil]['sex']=='f'))
               $cont++ ;         
        }
        echo "cantidad de mujeres mayores: ".$cont;
    }
mostrarMayores($people);
contarMujeresMenores($people);
?>

<?php
function tablearArray($array){
?>
<table border="1">
<caption>Tabla?</caption>
<thead>
<tr>
<th>name</th> <th>age</th> <th>sex</th>
</tr>
</thead>
<tbody>
<?php 
for($fil=0;$fil<sizeof($array);$fil++)
{
  
?>
<tr>

<td>
<?php
echo $array[$fil]['name'];
?>
</td>

<td>
<?php
echo $array[$fil]['age'];
?>
</td>

<td>
<?php
echo $array[$fil]['sex'];
?>
</td>
</tr>
 <?php
 }
 ?>
</tbody>
</table>
<?php
}
?>

<?php
tablearArray($people);
?>

<h4>6:</h4>

<?php 
function queDiaEs(){
    date_default_timezone_set('GMT');
    echo  "El dia en ingles es: ".date('l');
    if(date('l')=='saturday' or date('l')== 'sunday')
    echo "ES FIN DE SEMANA WIIII";
}
queDiaEs();
?>
<h4>7:</h4>
<?php 

$total_sale=0;
$type_sale= " ";

function calcularCompra($total_sale,$type_sale){

    if($total_sale<200){
        if($type_sale=='mascotas'){
            echo "no se puede realizar el envio";
        }
        if($type_sale=='ropa'){
            echo "los gastos de envio son 80 pesos";
        }
    }
    if($total_sale>=200 && $total_sale<=600){
        echo "los gastos de envio son 80 pesos";
    }
    if($total_sale>600){
        echo "el envio es gratarola";
    }
    if($total_sale>2000){
        echo "Codigo de descuento: CODEDESC33";
    }
}
calcularCompra(250,'mascotas');
?>

<h4>8:</h4>
<?php 

function encontrarMayor($a,$b,$c,$d){

    $mayor=$a;

    if($mayor<$b){
        $mayor=$b;
    }
    if($mayor<$c){
        $mayor=$c;
    }
    if($mayor<$d){
        $mayor=$d;
    }
    echo "El mayor es: ".$mayor;

}

encontrarMayor(5,7,10,2);

?>
<h4>3-1 1</h4>
<?php 

$name = 'juan,maria,pepe,andrea,jorgelina,cecilia';

$name_array=explode(",",$name);
$cont=0;

function mostrar($name_array){ 
for($cont=0;$cont<sizeof($name_array);$cont++)
{
    echo $name_array[$cont].'<br>';
}
}
sort($name_array);
 mostrar($name_array);


function primerMayuscula($array){
 $i=0;
 $aux;
    for($i=0;$i<sizeof($array);$i++){
    $aux[$i]=ucfirst($array[$i]);
}
return $aux;
}

$new_array=primerMayuscula($name_array);

 mostrar($new_array);

 $new_array_int=count($new_array);
 $keys=array(1,2,3,4,5,6);
 $keys_int=count($keys);
 echo "CANT ELEMENTOS ARRAY: ".$new_array_int." CANT ELEMENTOS KEYS: ".$keys_int.'<br>';
 mostrar($keys);

$array_asociative=array_combine($keys,$new_array);
function mostrarConKey($array){ 
    foreach ($array as $key => $value) {
        echo $value.'<br>';
    }
    }
    mostrarConKey($array_asociative);
?>
<h4>2</h4>


