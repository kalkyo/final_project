document.getElementsByClassName("btn-check-outlined").onclick = change;
function change()
{
    let elem = document.getElementById("buttonCheck");
    if (elem.innerHTML==="Add to cart")
    {
        elem.innerHTML = "Added to cart";
    }
    else elem.innerHTML = "Add to cart";
}