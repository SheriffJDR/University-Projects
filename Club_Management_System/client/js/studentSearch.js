let viewBtn = document.getElementsByClassName('view');
let viewMoreModalBackDrop = document.getElementsByClassName('modal-backdrop')[0];

//functionality for application modal
let toggleApplicationDisplay  = (e) => {

    if(viewMoreModalBackDrop.classList.contains('visible')){
        viewMoreModalBackDrop.classList.remove('visible');
        return;
    }
    viewMoreModalBackDrop.classList.add('visible');

    let id = e.target.value;
    let name = document.getElementById(id).children[0];
    let description = document.getElementById(id).children[1];

    document.getElementById('clubId').value = id;
    document.getElementById('clubName').value = name.value;
    document.getElementById('description').value = description.value;
    
}
//Applies event listeners to all view buttons.
for(let i = 0; i < viewBtn.length;i++ ){
    viewBtn[i].addEventListener('click',toggleApplicationDisplay);
}

//Applies event listeners to all view buttons.
viewMoreModalBackDrop.addEventListener('click',toggleApplicationDisplay);
