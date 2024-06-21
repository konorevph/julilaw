function toggleDescription(element) {
    var description = element.nextElementSibling;
    var arrow = element.querySelector('.arrow');
    if (description.style.display === "block") {
        description.style.display = "none";
        arrow.classList.remove('rotate');
    } else {
        description.style.display = "block";
        arrow.classList.add('rotate');
    }
}