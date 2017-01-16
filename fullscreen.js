function fullscreenfunkcijaon(referenca)
{
   
    document.getElementById("full_screen_slika").src=referenca.src;
    document.getElementById("full_screen_div").style.display="block";
}
function fullscreenfunkcijaoff()
{
        document.getElementById("full_screen_div").style.display="none";

}