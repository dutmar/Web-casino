const st = [1,2,3,4,5,6,7,8,9,10,11,12];
const nd = [13,14,15,16,17,18,19,20,21,22,23,24];
const rd = [25,26,27,28,29,30,31,32,33,34,35,36];

function get_number() {
    num = Math.floor(Math.random() * 37); 

    if((num % 2) === 0) {
        document.getElementById("broj").style.color = "black"

        if(num === 0) {
            document.getElementById("broj").style.color = "green";
        }
    } 

    if((num % 2) !== 0) {
        document.getElementById("broj").style.color = "red"
    }

    document.getElementById("broj").innerHTML = num;
}

function reset() {
    /*uncheckaj bets*/
    document.getElementById("1st").checked = false;
    document.getElementById("2nd").checked = false;
    document.getElementById("3rd").checked = false;

    /*boje*/
    document.getElementById("crno").checked = false;
    document.getElementById("crveno").checked = false;

    /*nula*/
    document.getElementById("nula").checked = false;

    /*par/nepar*/
    document.getElementById("par").checked = false;
    document.getElementById("nepar").checked = false;
}

function start_rulet() {
    get_number();
    document.getElementById("win").innerHTML = "";

    /*nula*/
    if(num === 0) {
        if(document.getElementById("nula").checked) {
            document.getElementById("win").innerHTML = "+100$";
        }
    }

    /*dvanaestine*/
    for(i = 0; i < st.length; i++) {
        if(num === st[i]) {
            if(document.getElementById("1st").checked) {
                document.getElementById("win").innerHTML = "+30$";
            }
        }
    }

    for(i = 0; i < nd.length; i++) {
        if(num === nd[i]) {
            if(document.getElementById("2nd").checked) {
                document.getElementById("win").innerHTML = "+30$";
            }
        }
    }

    for(i = 0; i < rd.length; i++) {
        if(num === rd[i]) {
            if(document.getElementById("3rd").checked) {
                document.getElementById("win").innerHTML = "+30$";
            }
        }
    }

    /*boje*/
    if(document.getElementById("broj").style.color === "red") {
        if(document.getElementById("crveno").checked) {
            document.getElementById("win").innerHTML = "+20$"
        }
    }

    if(document.getElementById("broj").style.color === "black") {
        if(document.getElementById("crno").checked) {
            document.getElementById("win").innerHTML = "+20$"
        }
    }

    if(num % 2 === 0 && num !== 0) {
        if(document.getElementById("par").checked) {
            document.getElementById("win").innerHTML = "+20$";
        }
    }

    if(num % 2 !== 0 && num !== 0) {
        if(document.getElementById("nepar").checked) {
            document.getElementById("win").innerHTML = "+20$";
        }
    }
    reset();
}

