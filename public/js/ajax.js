axios.get('/getvalue').then(function(response){
    const valeur = Math.floor(response.data.somme);
    const bar = new ldBar(document.getElementsByClassName('progress')[0]);
    bar.set(valeur);
});


function onUpgrade(event) {
     event.preventDefault();
     const url = this.href;
     const icone = this.getElementsByClassName('fas fa-trophy');

     axios.get(url).then(function(response){
         if(response.data.etat === 3) {
             icone[2].classList.add('full');
         }
         else if(response.data.etat === 2) {
             icone[1].classList.add('full');
         }
         else if (response.data.etat === 1) {
             icone[0].classList.add('full');
         }
         else {
             icone[0].classList.remove('full');
             icone[1].classList.remove('full');
             icone[2].classList.remove('full');
         }
         axios.get('/getvalue').then(function(response){
             const valeur = Math.floor(response.data.somme);
             const bar = new ldBar(document.getElementsByClassName('progress')[0]);
             bar.set(valeur);
         });

     });
}

document.querySelectorAll('a').forEach(function(link){
    link.addEventListener('click', onUpgrade)
});