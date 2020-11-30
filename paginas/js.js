fetch('https://reqres.in/api/users?page=2')
  .then(response => response.json())
  .then(avion => {


for(var i=0; i<avion.data.length; i++){

const x2=document.createElement('div');
var x1 = document.querySelector('.ClientesSatisfechos');


x2.innerHTML=
`<div class="col-md-10  card d-flex mt-4 mb-4 " style="width: 18rem;">
<img class="card-img-top" src="${avion.data[i].avatar}" alt="Card image cap">
<div class="card-body">
  <h5 class="card-title">${avion.data[i].first_name +" "+ avion.data[i].last_name}</h5>
  <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
</div>
</div>`;

x1.appendChild(x2);
}

});


var año = document.querySelector('.f1');

console.log(año);
var today = new Date();
var year = today.getFullYear();

año.innerHTML = year;


