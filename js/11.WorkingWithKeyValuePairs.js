function keyValuePairs(line) {
    //console.log(line);
    let arr = line.trim().split('\n');
    let keyFind = arr.slice(-1)[0];
    let keyValueArr = arr.slice(0, -1)
        .map(parseKeyValuePairs);


    function parseKeyValuePairs(str) {
        let tokens = str.split(' ');
        let result = {
            key: tokens[0],
            value: tokens[1]
        };
        return result;
    }

keyValueArr    //console.log(dict);

}

let input  = ('key value\n' +
    'key eulav\n' +
    'test tset\n' +
    'key\n');
keyValuePairs(input);