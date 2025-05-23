let viewBtn = document.getElementsByClassName('view');
let applyModalBackDrop = document.getElementsByClassName('modal-backdrop')[0];
let successModalBackDrop = document.getElementById('modal-backdrop');
let okBtn = document.getElementById('ok-btn');

//functionality for application modal
 let toggleApplicationDisplay  = (e) => {

    if(applyModalBackDrop.classList.contains('visible')){
        applyModalBackDrop.classList.remove('visible');
        return;
    }
    applyModalBackDrop.classList.add('visible');

    let id = e.target.value;
    let name = document.getElementById(id).children[0];
    let description = document.getElementById(id).children[1];

    document.getElementById('clubId').value = id;
    document.getElementById('clubName').value = name.value;
    document.getElementById('description').value = description.value;

    
}

//functionality for success modal 
let toggleSuccessDisplay = () =>{

     if(successModalBackDrop.classList.contains('visible')){

        successModalBackDrop.classList.remove('visible');
        return;
    }
    successModalBackDrop.classList.add('visible');

}

//Applies event listeners to all view buttons.
for(let i = 0; i < viewBtn.length;i++ ){
    viewBtn[i].addEventListener('click',toggleApplicationDisplay);
}

//Applies event listeners to success model.
if(okBtn != null && successModalBackDrop != null){

    okBtn.addEventListener('click',toggleSuccessDisplay);
    successModalBackDrop.addEventListener('click',toggleSuccessDisplay);
}


applyModalBackDrop.addEventListener('click',toggleApplicationDisplay);