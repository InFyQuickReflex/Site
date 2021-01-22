var mail = document.getElementById('replyto');
regex = /[A-Z0-9a-z._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,64}/;

function validateForm()
{
    if (confirm('Voulez-vous envoyer ce message ?'))
    {
    if(!regex.test(mail.value))
    {
        alert("Adresse mail incorrecte");
        return false;
    }
    }
    else
    {
        return false;
    } 

};
function validateFormEng()
{
    if (confirm('Do you want to send this message ?'))
    {
    if(!regex.test(mail.value))
    {
        alert("Wrong email adress !");
        return false;
    }
    }
    else
    {
        return false;
    } 

};
