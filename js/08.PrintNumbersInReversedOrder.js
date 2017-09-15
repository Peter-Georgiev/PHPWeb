function result(arr) {
    let arrNum = arr.map(Number);
    arrNum.reverse();
    for (let i = 0; i < arrNum.length; i++) {
        console.log(arrNum[i]);
    }
}

result(['5','5.5','24','-3']);