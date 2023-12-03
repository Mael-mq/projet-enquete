window.addEventListener("DOMContentLoaded",function(){

    var questions = JSON.parse(document.getElementById('div-questions').dataset.questions);
    console.log(questions);
    var reponses = JSON.parse(document.getElementById('div-reponses').dataset.reponses);
    console.log(reponses);

    var section = document.querySelector('section');
    var numQuestion = document.getElementById("numQuestion");
    var divQuestion = document.getElementById("question");
    var divReponses = document.getElementById("reponses");
    var resultats = document.getElementById('resultats');
    var bouton = document.getElementById("changementQuestion");
    var barre = document.getElementById("progression");
    var storage = localStorage;
    var nbQuestions = questions.length;
    var questionActuelle = 0;
    var largeurBarre = 0;
    

    function changementQuestion(){
        bouton.disabled = true;
        bouton.setAttribute('class', 'inactif');
        questionActuelle++;
        divReponses.innerHTML = "";
        numQuestion.innerHTML = "Question " + questionActuelle + "/" + nbQuestions;
        largeurBarre = (questionActuelle / nbQuestions) * 100;
        barre.style.width = largeurBarre + "%";

        if(storage.getItem("Question "+questionActuelle) == null){
            
            if(questionActuelle == nbQuestions){
                bouton.innerHTML = "Terminer le questionnaire";
                captcha.style.display = "block";
            }
            divQuestion.innerHTML = questions[questionActuelle-1].texte_question;
            reponses.forEach(function(element){
                if(element.id_question.id == questionActuelle){
                    let li = document.createElement("li");
                    divReponses.appendChild(li);

                    let label = document.createElement("label");
                    let input = document.createElement("input");
                    input.setAttribute("type", "radio");
                    input.setAttribute("name", "reponse");
                    input.setAttribute("value", element.id);
                    input.setAttribute("id", "rep" + element.id);
                    label.setAttribute("for", "rep" + element.id);
                    label.innerHTML = element.texte_reponse;

                    input.addEventListener("click", function(){
                        bouton.disabled = false;
                        bouton.setAttribute('class', '');
                    });

                    li.appendChild(input);
                    li.appendChild(label);
                }
            });
            
        }else{
            changementQuestion();
        }
    }

    if(storage.getItem("Question "+nbQuestions) != null){
        section.innerHTML = "";
        let para = document.createElement("p");
        para.setAttribute("id", "dejaRempli");
        para.innerHTML = "Vous avez déjà rempli le questionnaire";
        section.appendChild(para);
        resultats.style.display = "block";
    }else{
        changementQuestion();
    }

    bouton.addEventListener("click",function(){
        var selectedRadio = document.querySelector('input[type="radio"]:checked');
        var key = "Question " + questionActuelle;
        storage.setItem(key, selectedRadio.value);
        if(questionActuelle == nbQuestions){
            
                section.innerHTML = "";
                let reponseUtilisateur = [];
                for(let i = 1; i <= nbQuestions; i++){
                    reponseUtilisateur.push({
                        "question": i,
                        "reponse": parseInt(storage.getItem("Question " + i))
                    })
                }
                reponseUtilisateur = JSON.stringify(reponseUtilisateur);
                $.ajax({
                    type: 'POST',
                    url: '/enquete',
                    data: { reponseUtilisateur: reponseUtilisateur },
                    success: function(reponse) {
                        console.log(reponse);
                    },
                    error: function(xhr, statut, erreur) {
                        console.log(statut + ': ' + erreur);
                    }
                        
                });
    
                let para = document.createElement("p");
                para.setAttribute("id", "fini");
                para.innerHTML = "Vous avez fini le questionnaire";
                section.appendChild(para);
                resultats.style.display = "block";
            

        }else{
            changementQuestion();
        } 
    });
});