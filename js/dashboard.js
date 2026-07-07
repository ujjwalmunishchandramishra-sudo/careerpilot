// Dark Mode

let btn=document.getElementById("darkBtn");

btn.onclick=()=>{

document.body.classList.toggle("dark");

};




// Bar Chart

new Chart(

document.getElementById("barChart"),

{
type:"bar",

data:{

labels:[
"Applied",
"OA",
"Interview",
"Offer"
],

datasets:[{

label:"Applications",

data:[
25,
10,
6,
2
]

}]

}

}

);




// Pie Chart

new Chart(

document.getElementById("pieChart"),

{

type:"pie",

data:{

labels:[
"Arrays",
"Trees",
"Graphs",
"DP"
],

datasets:[{

data:[
40,
25,
20,
15
]

}]

}

}

);