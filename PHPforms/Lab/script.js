var nextId = 0;
function removeElement(id) {
    var inputDiv = document.getElementById(id);
    document.getElementById('parent').removeChild(inputDiv);
}

function addInput() {
    nextId++;
    var inputDiv = document.createElement("div");
    inputDiv.setAttribute("id", "num" + nextId);
    inputDiv.innerHTML =
        "<input type='text' name='nums[]' /> " +
        "<a href=\"javascript:removeElement('num" + nextId +
        "')\">[Remove]</a>" + "<br/>";
    document.getElementById('parent').appendChild(inputDiv);
}
