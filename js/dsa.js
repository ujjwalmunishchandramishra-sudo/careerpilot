let progress={

arrays:0,
linked:0,
trees:0

};

if(localStorage.getItem("dsa")){

progress=
JSON.parse(
localStorage.getItem("dsa")
);

}

updateUI();

function updateCount(topic,value){

progress[topic]+=value;

if(progress[topic]<0)
progress[topic]=0;

updateUI();

localStorage.setItem(

"dsa",

JSON.stringify(progress)

);

}



function updateUI(){

// Arrays

document.getElementById(
"arraysCount"
).innerHTML=

progress.arrays+" / 50";

document.getElementById(
"arraysBar"
).style.width=

(progress.arrays/50)*100+"%";



// Linked List

document.getElementById(
"linkedCount"
).innerHTML=

progress.linked+" / 30";

document.getElementById(
"linkedBar"
).style.width=

(progress.linked/30)*100+"%";



// Trees

document.getElementById(
"treesCount"
).innerHTML=

progress.trees+" / 40";

document.getElementById(
"treesBar"
).style.width=

(progress.trees/40)*100+"%";

}