const header = document.querySelector('header');
console.log(header);

onscroll = () => {
    header.classList.toggle('active', window.scrollY > 0);
}