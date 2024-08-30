function showAndRemove(createEle)
{
    let form = document.getElementById(createEle);
    if(form.classList.contains("invisible"))
    {
        form.classList.remove("invisible");
        form.classList.add("visible");
    }
    else{
        form.classList.remove("visible");
        form.classList.add("invisible");
    }
}