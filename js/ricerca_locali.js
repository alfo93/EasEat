filterSelection("all");


function filterSelection(c) {
    var x, i;
    x = document.getElementsByClassName("filterDiv");
    console.log(x);
    if (c == "all") c = "";
    for (i = 0; i < x.length; i++) {
        w3RemoveClass(x[i], "show");
        if (x[i].className.indexOf(c) > -1) w3AddClass(x[i], "show");
    }
}

function w3AddClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        if (arr1.indexOf(arr2[i]) == -1) {
            element.className += " " + arr2[i];
        }
    }
}

function w3RemoveClass(element, name) {
    var i, arr1, arr2;
    arr1 = element.className.split(" ");
    arr2 = name.split(" ");
    for (i = 0; i < arr2.length; i++) {
        while (arr1.indexOf(arr2[i]) > -1) {
            arr1.splice(arr1.indexOf(arr2[i]), 1);
        }
    }
    element.className = arr1.join(" ");
}

// Add active class to the current button (highlight it)
var btnContainer = document.getElementById("myBtnContainer");
var btns = btnContainer.getElementsByClassName("btn");
for (var i = 0; i < btns.length; i++) {
    btns[i].addEventListener("click", function() {
        var current = document.getElementsByClassName("active");
        current[0].className = current[0].className.replace(" active", "");
        this.className += " active";
    });
}

function tryToSort() {

    var radioButtons = document.getElementsByName("sort");

    var toSort = document.getElementById('list').children;
    var returnedOriginal = toSort;
    var modifiedSort = toSort;

    for (var i = 0; i < radioButtons.length; i++) {
        if (radioButtons[i].checked == true) {
            modifiedSort = Array.prototype.slice.call(modifiedSort, 0);
            modifiedSort.sort(function(a, b) {
                var aord = +a.id.split('-')[1];
                var bord = +b.id.split('-')[1];
                return aord - bord;
            });

            var parent = document.getElementById('list');
            parent.innerHTML = "";

            for (var i = 0, l = modifiedSort.length; i < l; i++) {
                parent.appendChild(modifiedSort[i]);
            }


        } else {

            returnedOriginal = Array.prototype.slice.call(returnedOriginal, 0);
            returnedOriginal.sort(function(a, b) { return 0.5 - Math.random() });
            var parent = document.getElementById('list');
            parent.innerHTML = "";

            for (var i = 0, l = returnedOriginal.length; i < l; i++) {
                parent.appendChild(returnedOriginal[i]);
            }

        }
    }
};