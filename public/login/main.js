const individualOption = document.querySelector('#individual');
const businessOption = document.querySelector('#company');
const studentOption = document.querySelector('#student');

individualOption.addEventListener('click', displayMessage);
businessOption.addEventListener('click', displayMessage);
studentOption.addEventListener('click', displayMessage);

function displayMessage(){
    const message = document.querySelector('.message__selection');

    if(individualOption.checked){
        message.innerHTML = `Hi, User. Please fill out the form with your PERSONAL information`
    } else if(businessOption.checked){
        message.innerHTML = `Hi, User. Please fill out the form with your COMPANY credentials`
    }else if(studentOption.checked){
        message.innerHTML = `Hi, User. Please fill out the form with your student credentials`
    }
}
