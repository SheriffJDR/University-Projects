let applyModalBackDrop = document.getElementById('application-modal');
let successModalBackDrop = document.getElementById('modal-backdrop');
let okBtn = document.getElementById('ok-btn');
let applicationRecord = document.getElementsByClassName('application-record');

//functionality for success modal 
let toggleSuccessDisplay = () =>{

    if(successModalBackDrop.classList.contains('visible')){

       successModalBackDrop.classList.remove('visible');
       return;
   }
   successModalBackDrop.classList.add('visible');

}
let toggleApplyDisplay = () =>{

    if(applyModalBackDrop.classList.contains('visible')){

       applyModalBackDrop.classList.remove('visible');
       return;
   }
   applyModalBackDrop.classList.add('visible');

}
let openApplication = (e) =>{
e.stopPropagation();

    
    let id = e.target.parentNode;
    console.log(id);

    let applicationId= id.children[0].value;
    let studentFName = id.children[1].value;
    let studentLName = id.children[2].value;
    let clubId = id.children[3].value;
    let clubName = id.children[4].value;
    let status = id.children[5].value;
    let date = id.children[6].value;

    document.getElementById('applicationId').value = applicationId;
    document.getElementById('studentName').value = `${studentFName} ${studentLName} `;
    document.getElementById('clubId').value = clubId;
    document.getElementById('clubName').value = clubName;
    document.getElementById('status').value = status;
    document.getElementById('date').value = date;

    toggleApplyDisplay();

}
//Applies event listeners to success modal it has been rendered.
if(okBtn != null && successModalBackDrop != null){

    okBtn.addEventListener('click',toggleSuccessDisplay);
    successModalBackDrop.addEventListener('click',toggleSuccessDisplay);
}
//Applies event listener to each miniized record
for(let i =0; i < applicationRecord.length;i++){
    applicationRecord[i].addEventListener('click',openApplication);
}

applyModalBackDrop.addEventListener('click',toggleApplyDisplay,true);