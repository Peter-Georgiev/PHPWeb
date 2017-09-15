function result(line) {
    let num1 = Number(line[0]);
    let num2 = Number(line[1]);

    console.log(multiply(num1, num2));

    function multiply(num1, num2) {
        return num1 * num2;
    }
}

result(['2', '2']);