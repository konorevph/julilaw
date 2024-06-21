document.addEventListener("DOMContentLoaded", function () {
    const _formSelectors = document.querySelectorAll(".selector-input");
    const _formSelectorOptions = document.querySelectorAll(".selector-options>.option");

    document.querySelectorAll(".selector-input.readonly").forEach(input => {
        input.addEventListener("keydown", event => {
            if (event.key !== "Tab") {
                event.preventDefault();
            }
        });
    
        input.addEventListener("paste", event => {
            event.preventDefault();
        });
    
        input.addEventListener("focus", event => {
            event.preventDefault();
        });
    
        input.addEventListener("mousedown", event => {
            event.preventDefault();
        });
    });
    
    _formSelectors.forEach(selector => {
        selector.addEventListener("click", event => {
            let name = selector.getAttribute("name");
            let options = document.querySelector('.selector-options[for="' + name + '"]');
            
            if (options.style.display === "block") {
                closeSelectors();
                return;
            }

            selector.classList.add("active");
            options.style.display = "block"; 
            options.style.top = `${selector.offsetTop + selector.offsetHeight}px`;
            options.style.left = `${selector.offsetLeft}px`;

            setTimeout(() => {
                document.addEventListener("click", closeSelectors);
            }, 0);
            
        });
    });

    _formSelectorOptions.forEach(option => {
        option.addEventListener("click", event => {
            let options = option.parentElement;
            let name = options.getAttribute("for");
            let selector = document.querySelector('.selector-input[name="' + name + '"]')
            selector.value = option.innerText;
            closeSelectors(event);
        });
    });

    const closeSelectors = event => {
        if (event && event.target.classList.contains('selector-input')) return;
        document.querySelectorAll(".selector-options").forEach(options => {
            options.style.display = "none";
        });
        _formSelectors.forEach(selector => {
            selector.classList.remove("active");
        });
        document.removeEventListener("click", closeSelectors);
    }
});
