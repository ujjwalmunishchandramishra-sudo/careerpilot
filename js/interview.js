function toggleAnswer(element){

let answer=

element.nextElementSibling;

if(answer.style.display==="block"){

answer.style.display="none";

}

else{

answer.style.display="block";

}

}



let searchBox=

document.getElementById("searchBox");

searchBox.addEventListener(

"keyup",

function(){

let filter=

searchBox.value.toLowerCase();

let questions=

document.querySelectorAll(".question");

questions.forEach(question=>{

let text=

question.innerText.toLowerCase();

if(text.includes(filter)){

question.style.display="block";

}

else{

question.style.display="none";

}

});

});