let button = document.getElementById('button');

button.onclick = function (e) {
    e.preventDefault();

    let num1 = Number(document.getElementById('num1').value);
    let num2 = Number(document.getElementById('num2').value);
    let sum = num1 + num2;
    let result = document.getElementById('result');
    result.value = sum;
    result.setAttribute("disabled", "disabled")
    result.setAttribute("style", "color: red")

    let resultLabel = document.getElementById('result_label');
    resultLabel.setAttribute('style', "color: red");
}