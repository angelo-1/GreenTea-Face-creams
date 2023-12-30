<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>mutiplication</title>
</head>
<body>
<?php
echo"<form method='post'>
Number 1: <input type='number' id='num1'>
Number 2: <input type='number' id='num2'>
Number 3: <input type='number' id='num3'>
<br><br>
Result: <input id='result' readonly >
<br><br>
<button type='button' onclick='multiply()'>Multiply</button><br><br>
Enter a number: <input type='number' id='nums'><br><br>
Result: <p id='results'></p>
<button type='button' onclick='multiply1()'>Multiply</button><br><br>
</form>";
?>
<script>
    function multiply(){
    var num1 = document.getElementById('num1').value;
    var num2 = document.getElementById('num2').value;
    var num3 = document.getElementById('num3').value;
    var mult=num1*num2*num3;
    document.getElementById('result').value =mult;
    }
    
    function multiply1(){
        var array1=[1,2,3,4,5,6,7,8,9,10]
        var nums = parseInt(document.getElementById('nums').value);
        var mult1=array1.map(item=>{
            return item * nums;
        });
        document.getElementById('results').innerHTML = mult1;
    }
</script>
</body>
</html>