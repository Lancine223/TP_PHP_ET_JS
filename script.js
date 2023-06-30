const afficherbtn =document.getElementById('popup_promo');
const pr_form = document.getElementById('id_p');

afficherbtn.addEventListener('click', function (){
    pr_form.style.display = 'block';
});

const hide_form = document.getElementById('id_p');

hide_form.addEventListener('submit', function(){
    pr_form.style.display = 'none';
});

// generate mat 
var matricule = document.getElementById('matcle').value=create_mat(4);
function create_mat(str_length){
    
    // var btn = document.getElementById('button');

    var random_str ="";
    var caract = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789abcdefghijklmnopqrstuvwxyz';
    for(var i , i=0 ; i < str_length ; i++){
        random_str += caract.charAt(Math.floor(Math.random()* caract.length));
    }
    return random_str;
}