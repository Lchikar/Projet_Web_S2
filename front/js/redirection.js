document.addEventListener("DOMContentLoaded", function (event) {
   const btnConnexion = document.getElementById("submitConnexion");
    
    btnConnexion.addEventListener("click", seConnecter);
    
    
    /*btnConnexion.onclick = () => {
        console.log("hey");
        const form = document.getElementById('formConnexion');

        form.action = "connexion_compt.php";
        
    }*/
    //console.log(btnConnexion.onclick);
    
    
    /*const btnInscription = document.getElementById("submitInscription");
    btnConnexion.onclick = event => {
        event.preventDefault();
        const form = document.getElementById('formConnexion');

        form.action = "inscription.php";
        
    }*/
    
    
    function seConnecter(evt){
        console.log("hello");
        const form = document.getElementById('formConnexion');

        form.action = "connexion_compt.php";
        console.log("j'ai cliqué");
    }


    /*function connexion(evt) {
        const form = document.getElementById('formConnexion');
        form.action = "connexion_compt.php";
        

    }

    function inscription(evt) {
        const form = document.getElementById('formConnexion');
        form.action = "inscription.php";
        

    }*/
});