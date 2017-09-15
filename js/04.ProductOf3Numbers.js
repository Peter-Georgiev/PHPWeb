function result(arr) {
    let num1 = Number(arr[0]);
    let num2 = Number(arr[1]);
    let num3 = Number(arr[2]);
    
    console.log(positiveOrNegative());
    
    function positiveOrNegative() {
        return multiply(num1, num2, num3) >= 0 ?
            "Positive":"Negative";
    }

    function multiply(num1, num2, num3) {
        return num1 * num2 * num3;
    }
}

result(['2', '3', '4']);