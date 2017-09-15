function result(line) {
    let x = Number(line[0]);
    let n = Number(line[1]);

    console.log(mathMorD(x, n));

    function mathMorD(n, x) {
        return x >= n ? n * x : n / x;
    }
}

result(['2', '3']);