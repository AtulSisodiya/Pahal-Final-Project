/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */


const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');

signUpButton.addEventListener('click', () => {
	document.body.style.backgroundImage = "url('assets/img/aditya-saxena-_mIXHvl_wzA-unsplash.jpg')";
    container.classList.add("right-panel-active");
});

signInButton.addEventListener('click', () => {
	document.body.style.backgroundImage = "url('assets/img/2.jpg')";
    container.classList.remove("right-panel-active");
});


