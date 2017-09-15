function addOrRemoveElement(line) {
    let arr = [];

    return printResult(arr);

    function matchesLine(arr, line) {
        let pattern = /([a-zA-Z]+)\s+(-*[0-9]+)/g;
        let matches =[];
        while (matches = pattern.exec(line)){
            let match = [];
            match.push(matches[1]);
            match.push(matches[2]);
            let key = match[0];
            let value = Number(match[1]);

            if (key.toLowerCase() == "add") {
                arr.push(value);
            } else if (key.toLowerCase() == "remove" && value > -1){
                arr.splice(value, 1);
            }
        }
        return arr;
    }

    function printResult() {
        matchesLine(arr, line).forEach(v => console.log(v));
    }
}


addOrRemoveElement(['add 3', 'add 5', 'remove 1', 'add 2']);