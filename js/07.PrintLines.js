function print(arr) {
    for (let i = 0; i <= arr.length; i++){
        if(arr[i] == "Stop"){
            break;
        }
        console.log(arr[i]);
    }
}

print(['1','3','5','Stop','4','5','7'])