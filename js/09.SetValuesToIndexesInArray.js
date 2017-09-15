function valuesToIndexes(line) {
    let arr = [];
    arr.length = Number(line[0]);
    for (let i = 0; i < arr.length; i++){
        arr[i] = 0;
    }

    return printResult(arr);

    function matchesLine(arr, line) {
        let pattern = /(?:(-*[0-9]+) . (-*[0-9]+)).*?/g;
        let matches = [];
        while (matches = pattern.exec(line)) {
            let match = [];
            Number(match.push(matches[1]));

            if (match[0] >= 0 && match[0] < arr.length){
                match.push(matches[2]);
                arr[match[0]] = match[1];
            }
        }
        return arr;
    }

    function printResult(arr) {
        matchesLine(arr, line).forEach(e => console.log(e));
    }
}

valuesToIndexes(['5', '0 - 3', '3 – -1', '4 – 2']);