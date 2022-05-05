compteurDeJours = 0
function Tableau2D(x, y) {
    var array2D = new Array(x);
    for (var i = 0; i < array2D.length; i++) {
        array2D[i] = new Array(y);
    }
    return array2D;
}
let monTableau = new Tableau2D(10, 10);

function De10() {
    let nombreFace = 10
    return Math.floor(Math.random() * nombreFace );
}
function De8() {
    let nombreFace = 8
    return Math.floor(Math.random() * nombreFace );
}
function De6() {
    let nombreFace = 6
    return Math.floor(Math.random() * nombreFace );
}


TabMalus = ["Bonus1", "Bonus2","Bonus3","Malus1", "Malus2", "Malus3","Malus4","Malus5"]

TabCommentairesMalus=["Vous tombez sur des moines qui se sont égarés, ils vous font donc tester leur dernière cuvée de 9e centenaire, vous en buvez trop est tombez dans un coma.",
" lors d'une randonnée un dahu vous attaque,  vous vous cassez la cheville.","Un écologiste bobo apparaît et vous sermonne car vous ne mangez pas du quinoa . ","Vous rencontrez Jean la Salle et partez en campagne avec lui .",
"Vous venez de vous rappeler que vous n'avez pas fermé la porte de votre garage vous rentrez donc chez vous pour la fermer .","Vous faites arrêter la par la police car vous utilisez vos clignotants ."]

TabCommentairesBonus=["Vous retrouvez  le skateboard volant de quelqu'un qui vous ramène quelques temps en arrière.","Vous vous rasez et avez l'air donc plus jeune .","Vous avez trouvé un raccourci pour arriver à cette destination.",
"vous craquez le jeu et gagnez du temps .","Les dieux ont été cléments envers vous ","Vous avez donné une Tesla à Mr Roumanet ce qui vous permet d'être plus rapide ."]

console.log(TabMalus)

function Placementcases(diffictulte) {

    for (let i = 0; i < diffictulte; i++) {
        let idx = De10()
        let idy = De10()
        monTableau[idx][idy] = TabMalus[De8()]
    }
    monTableau[De10()][De10()] = "Tresor";
}
diffictulte = 35
Placementcases(diffictulte)
console.log(monTableau)

function drawTableau2D(x, y, emplacement) {
    let idString = ""
    let texte = "<table>"
    for (let xx = 0; xx < x; xx++) {
        texte += `<tr>`
        for (let yy = 0; yy < y; yy++) {
            idString = xx + "-" + yy
            texte += `<td onclick="choix(this.id);" id="${idString}"></td>`
        }
        texte += `</tr>`
    }
    texte += `</table>`
    document.getElementById(emplacement).innerHTML = texte
}
drawTableau2D(10, 10, "ici")

compteurDeJours = 0

function choix(id) {
    console.log(id)
    let idcase = document.getElementById(id)
    compteurDeJours = compteurDeJours + 1
    let tabCoordonees = id.split("-")
    let idx = tabCoordonees[0];
    let idy = tabCoordonees[1];
    let CommentairesMalus = document.getElementById("commentaire")
    let CommentairesBonus = document.getElementById("commentaire")


    if (monTableau[idx][idy] == "Tresor") {
        
        Findepartie = true
        console.log("trouvé")
        idcase.style.pointerEvents = "none"
    }
    else if (monTableau[idx][idy] == "Malus1") {
        compteurDeJours = compteurDeJours + 2
        idcase.style.backgroundColor = "rgba(255, 225, 0, 0.858)";
        idcase.style.pointerEvents = "none"
        CommentairesMalus.innerHTML = TabCommentairesMalus[De6()] + "<Malus1> Pénalitée de 2 jours </Malus1>"

    }
    else if (monTableau[idx][idy] == "Malus2") {
        compteurDeJours = compteurDeJours + 3
        idcase.style.backgroundColor = "rgba(255, 200, 0, 0.707)";
        idcase.style.pointerEvents = "none"
        CommentairesMalus.innerHTML = TabCommentairesMalus[De6()]+ "<Malus2> Pénalitée de 3 jours </Malus2>"

    }
    else if (monTableau[idx][idy] == "Malus3") {
        compteurDeJours = compteurDeJours + 4
        idcase.style.backgroundColor = "rgba(255, 174, 0, 0.845)";
        idcase.style.pointerEvents = "none"
        CommentairesMalus.innerHTML = TabCommentairesMalus[De6()] + "<Malus3> Pénalitée de 4 jours </Malus3>"

    }
    else if (monTableau[idx][idy] == "Malus4") {
        compteurDeJours = compteurDeJours + 5
        idcase.style.backgroundColor = "rgba(255, 102, 0, 0.759)";
        idcase.style.pointerEvents = "none"
        CommentairesMalus.innerHTML = TabCommentairesMalus[De6()] + "<Malus4> Pénalitée de 5 jours </Malus4>"

    }
    else if (monTableau[idx][idy] == "Malus5") {
        compteurDeJours = compteurDeJours +6
        idcase.style.backgroundColor = "rgba(255, 0, 0, 0.738)";
        idcase.style.pointerEvents = "none"
        CommentairesMalus.innerHTML = TabCommentairesMalus[De6()] + "<Malus5> Pénalitée de 6 jours </Malus5>"

    }

    else if (monTableau[idx][idy] == "Bonus1") {
        compteurDeJours = compteurDeJours - 2
        idcase.style.backgroundColor = "rgba(0, 255, 157, 0.797)";
        idcase.style.pointerEvents = "none"
        CommentairesBonus.innerHTML = TabCommentairesBonus[De6()] + "<Bonus1> Bonus de 1 jour </Bonus1>"

    }
    else if (monTableau[idx][idy] == "Bonus2") {
        compteurDeJours = compteurDeJours - 3
        idcase.style.backgroundColor = "rgba(0, 255, 234, 0.821"
        idcase.style.pointerEvents = "none"
        CommentairesBonus.innerHTML = TabCommentairesBonus[De6()] + "<Bonus2> Bonus de 2 jours </Bonus2>"


    }
    else if (monTableau[idx][idy] == "Bonus3") {
        compteurDeJours = compteurDeJours - 4
        idcase.style.backgroundColor = "rgba(0, 204, 255, 0.707)"
        idcase.style.pointerEvents = "none"
        CommentairesBonus.innerHTML = TabCommentairesBonus[De6()] + "<Bonus3> Bonus de 3 jours </Bonus3>"


    }
    else {
        idcase.style.backgroundColor = "rgba(128, 128, 128, 0.773)"
        idcase.style.pointerEvents = "none"
        CommentairesBonus.innerHTML = "<RAS>R.A.S</RAS>"

    }
    document.getElementById("jours").innerHTML = compteurDeJours


}


