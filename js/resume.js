function analyzeResume(){

let text=
document.getElementById("resumeText")
.value.toLowerCase();

const skills=[

"java",
"python",
"javascript",
"html",
"css",
"mysql",
"react",
"node",
"sql",
"c++"

];

let foundSkills=[];

skills.forEach(skill=>{

if(text.includes(skill)){

foundSkills.push(skill);

}

});

let score=

(foundSkills.length/skills.length)*100;

document
.getElementById("progressBar")
.style.width=score+"%";

document
.getElementById("progressBar")
.innerHTML=Math.floor(score)+"%";


let skillsList=
document.getElementById("skillsList");

skillsList.innerHTML="";

foundSkills.forEach(skill=>{

skillsList.innerHTML+=

`<li>${skill}</li>`;

});


let suggestions=
document.getElementById("suggestions");

suggestions.innerHTML="";


skills.forEach(skill=>{

if(!foundSkills.includes(skill)){

suggestions.innerHTML+=

`<li>Add ${skill}</li>`;

}

});

}