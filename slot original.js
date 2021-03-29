/*NE RADI*/
/*import { createRequire } from 'module';
const require = createRequire(import.meta.url);

var mysql = require('mysql');

var con = mysql.createConnection({
host: "localhost",
user: "root",
password: "",
database: "casino"
});*/

const apple = 'apple.png';
const cherry = 'cherry.png';
const lemon = 'lemon.png';
const grape = 'grape.png';
const seven = 'seven.png';
const diamond = 'diamond.png';
const heart = 'heart.png';
const orange = 'orange.png';

const slike = [apple, cherry, lemon, grape, seven, diamond, heart, orange];

var counter1 = 0;
var counter2 = 0;
var counter3 = 0;

var time = 1400;

function start() {
    x = setInterval(slot_one, 10);
    y = setInterval(timer, 10);
}

function pocetak() {
    slot_a = Math.floor(Math.random() * slike.length);
    var img1 = new Image();
    img1.src = slike[slot_a];
    img1.width = "300";
    img1.height = "300";
    document.getElementById('slika1').appendChild(img1); 

    slot_b = Math.floor(Math.random() * slike.length);
    var img2 = new Image();
    img2.src = slike[slot_b];
    img2.width = "300";
    img2.height = "300"; 
    document.getElementById('slika2').appendChild(img2); 

    slot_c = Math.floor(Math.random() * slike.length);
    var img3 = new Image();
    img3.src = slike[slot_c];
    img3.width = "300";
    img3.height = "300"; 
    document.getElementById('slika3').appendChild(img3); 

}

function slot_one() {
    document.getElementById("cestitka").innerHTML = "";
    
    counter1++;
    console.log(counter1);

    if(counter1 === 60) {
        slot_a = Math.floor(Math.random() * slike.length);
        document.getElementById('slika1').innerHTML = "";
        var img = new Image();
        img.src = slike[slot_a];
        img.width = "300";
        img.height = "300"; 
        document.getElementById('slika1').appendChild(img); 

        /*clearInterval(x);*/
    }
    
    counter2++;

    if(counter2 === 100) {
        slot_b = Math.floor(Math.random() * slike.length);
        document.getElementById('slika2').innerHTML = "";
        var img = new Image();
        img.src = slike[slot_b];
        img.width = "300";
        img.height = "300"; 
        document.getElementById('slika2').appendChild(img); 

        /*clearInterval(y);*/
    }

    counter3++;

    if(counter3 === 140) {
        slot_c = Math.floor(Math.random() * slike.length);
        document.getElementById('slika3').innerHTML = "";
        var img = new Image();
        img.src = slike[slot_c];
        img.width = "300";
        img.height = "300"; 
        document.getElementById('slika3').appendChild(img); 

        counter1 = 0;
        counter2 = 0;
        counter3 = 0;

        clearInterval(x);

        if(slot_a === slot_b && slot_a === slot_c && slot_b === slot_c) {
            document.getElementById("cestitka").innerHTML = "Čestitamo + 1000$";

            var objXMLHttpRequest = new XMLHttpRequest();
            objXMLHttpRequest.onreadystatechange = function() {
            if(objXMLHttpRequest.readyState === 4) {
                if(objXMLHttpRequest.status === 200) {
                    alert(objXMLHttpRequest.responseText);
                } else {
                    alert('Error Code: ' +  objXMLHttpRequest.status);
                    alert('Error Message: ' + objXMLHttpRequest.statusText);
                }
            }
            }
            objXMLHttpRequest.open('GET', 'update_balance_win.php');
            objXMLHttpRequest.send();
        } else {
            document.getElementById("cestitka").innerHTML = "";

            var objXMLHttpRequest = new XMLHttpRequest();
            objXMLHttpRequest.onreadystatechange = function() {
            if(objXMLHttpRequest.readyState === 4) {
                if(objXMLHttpRequest.status === 200) {
                    /*alert(objXMLHttpRequest.responseText);*/
                } else {
                    /*alert('Error Code: ' +  objXMLHttpRequest.status);
                    alert('Error Message: ' + objXMLHttpRequest.statusText);*/
                }
            }
            }
            objXMLHttpRequest.open('GET', 'update_balance_lose.php');
            objXMLHttpRequest.send();

            /*NE RADI*/
            /*con.connect(function(err) {
                if (err) throw err;
                var sql = "UPDATE balance SET balance = '-20' WHERE username = $_SESSION['username']";
                con.query(sql, function (err, result) {
                    if (err) throw err;
                    console.log(result.affectedRows + " record(s) updated");
                });
            });*/
        }
    }
}

function timer() {
    document.getElementById("timer").innerHTML = "";
    time -= 10;

    document.getElementById("timer").innerHTML = time;

    if(time === 0) {
        document.getElementById("timer").innerHTML = "DONE";
        time = 1400;
        clearInterval(y);
    }

}

function balance() {
    setInterval(function() {
    }, 0);
}
