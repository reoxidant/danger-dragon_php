window.onload =
    () => {
        const navButtons = document.querySelector(".nav-bar");
        navButtons.addEventListener("click", (e) => {
            const targetClassName = e.target.className;
            console.log(targetClassName);
        });
    };


