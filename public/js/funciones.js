function grabar(){
    alert("Se grabó con éxito")
}

const btnSwitch = document.querySelector('#switch');
const logo = document.querySelector('#accordionSidebar');
const navbar = document.querySelector('#navbar');
const c = document.querySelector('#content');
const footer = document.querySelector('#footer');
const search = document.querySelector('#search');
const table1 = document.querySelector('#dataTable1');

btnSwitch.addEventListener('click', () => {
    document.body.classList.toggle('dark');
    btnSwitch.classList.toggle('active');
    logo.classList.toggle('dark');
    navbar.classList.toggle('dark');
    c.classList.toggle('grisOscuro');
    footer.classList.toggle('dark');
    search.classList.toggle('grisClaro');
    table1.classList.toggle('dark');
//});

	// Guardamos el modo en localstorage.
	if(document.body.classList.contains('dark')){
		localStorage.setItem('dark-mode', 'true');
	} else {
		localStorage.setItem('dark-mode', 'false');
	}
});

// Obtenemos el modo actual.
if(localStorage.getItem('dark-mode') === 'true'){
	document.body.classList.add('dark');
	btnSwitch.classList.add('active');
    logo.classList.add('dark');
    navbar.classList.add('dark');
    c.classList.add('grisOscuro');
    footer.classList.add('dark');
    search.classList.add('grisClaro');
    table1.classList.add('dark');
} else {
	document.body.classList.remove('dark');
	btnSwitch.classList.remove('active');
    logo.classList.remove('dark');
    navbar.classList.remove('dark');
    c.classList.remove('grisOscuro');
    footer.classList.remove('dark');
    search.classList.remove('grisClaro');
    table1.classList.remove('dark');
}