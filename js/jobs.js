let jobs=[];

function displayJobs(){

let tableBody=
document.getElementById("tableBody");

tableBody.innerHTML="";

jobs.forEach((job,index)=>{

tableBody.innerHTML+=`

<tr>

<td>${job.company}</td>

<td>${job.role}</td>

<td>${job.status}</td>

<td>

<button onclick="deleteJob(${index})">

Delete

</button>

</td>

</tr>

`;

});

}


function addJob(){

let company=
document.getElementById("company").value;

let role=
document.getElementById("role").value;

let status=
document.getElementById("status").value;

jobs.push({

company,
role,
status

});

displayJobs();

}


function deleteJob(index){

jobs.splice(index,1);

displayJobs();

}