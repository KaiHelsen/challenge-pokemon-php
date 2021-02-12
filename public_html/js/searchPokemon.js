let input = document.getElementById("pokemon-name");

document.getElementById("search-button").addEventListener("click", () =>
{
// let url = window.location.hostname;
    let url = 'http://mypokedex.local/index.php'
    let userInput = input.value;

    if(!input.value){
        return;
    }
    url = url + "/?q=" + input.value + "";
    window.location.href = url;
});